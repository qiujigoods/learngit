<?php

namespace Modules\Admin\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use DB;

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
        //echo 1;die;
        // 判断session中是否存在用户信息
        if (!request()->session()->has('info')) {
<<<<<<< HEAD
            echo "请登录";die;
        }
        echo "999";die;

        // 获取用户信息
        $info = request()->session()->get('info');

        $admin_role = DB::table('admin_role')->where('admin_id', $info->id)->get();

        $object = $admin_role->first();
        
        $role_node = DB::table('role_node')->where('role_id', $object->role_id)->get();
=======
            echo '请先登录！';die;
           
        }
         // 获取用户信息
            $info = request()->session()->get('info');
            //var_dump($info);die;

            $admin_role = DB::table('admin_role')->where('admin_id', $info->id)->get();
            //var_dump($admin_role);die;

            $j = 0;
            //判断
            if (count($admin_role) == $j) {
                echo "请通知超管分配角色";die;
            }

            $object = $admin_role->first();

            $role_node = DB::table('role_node')->where('role_id', $object->role_id)->get();

            
            $relations = [];
>>>>>>> 3bade7f0df49aa60d0e190b7ab5527ab1f810855

        $relations = [];

        foreach ($role_node as $k => $v) {
            $relations[] = $v->node_id;
        }

<<<<<<< HEAD
        $node = DB::table('node')->whereIn('id', $relations)->get();
=======
            $node = DB::table('node')->whereIn('id', $relations)->get();
            //var_dump($node);die;
>>>>>>> 3bade7f0df49aa60d0e190b7ab5527ab1f810855


        $i = 0;
        //判断
        if (count($node) == $i) {
            echo "无权限";die;
        }

<<<<<<< HEAD
        //获取要执行的动作
        $url = \Route::current()->getActionName();
        print_r($url);die;
=======
            //获取要执行的动作
            $url = \Route::current()->getActionName();
            // var_dump($url);die;
>>>>>>> 3bade7f0df49aa60d0e190b7ab5527ab1f810855

        $contro = strtolower(substr($url, strrpos($url, '\\')+1));

<<<<<<< HEAD
        $controller = substr($contro, 0, strrpos($contro, 'controller'));
        $action = substr($contro, strpos($contro, '@')+1);

        foreach ($node as $k => $v) {
            if ($v->node_controllers === $controller && $v->node_action === $action) {
                break;
=======
            $controller = substr($contro, 0, strrpos($contro, 'controller'));
            $action = substr($contro, strpos($contro, '@')+1);
            // var_dump($controller);
            // var_dump($action);die;

            foreach ($node as $k => $v) {
                //var_dump($v->node_controllers.'/'.$v->node_action);die;
                if ($v->node_controllers.'/'.$v->node_action === $controller.'/'.$action) {
                   
                    return $next($request);
                }
>>>>>>> 3bade7f0df49aa60d0e190b7ab5527ab1f810855
            }
         echo "无此权限！";die;

        
    }
}
