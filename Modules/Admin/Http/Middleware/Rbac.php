<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Rbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 判断session中是否存在用户信息
        if (request()->session()->has('info')) {
            // 获取用户信息
            $info = request()->session()->get('info');

            $admin_role = DB::table('admin_role')->where('admin_id', $info->id)->get();

            $object = $admin_role->first();
            
            $role_node = DB::table('role_node')->where('role_id', $object->admin_id)->get();

            $relations = [];

            foreach ($role_node as $k => $v) {
                $relations[] = $v->node_id;
            }

            $node = DB::table('node')->whereIn('id', $relations)->get();

            //获取要执行的动作
            $url = \Route::current()->getActionName();

            $contro = strtolower(substr($url, strrpos($url, '\\')+1));

            $controller = substr($contro, 0, strrpos($contro, 'controller'));
            $action = substr($contro, strpos($contro, '@')+1);

            foreach ($node as $k => $v) {
                if ($v->node_controllers === $controller && $v->node_action === $action) {
                    return redirect($controller/$action);
                }
            }
        }

        return $next($request);
    }
}
