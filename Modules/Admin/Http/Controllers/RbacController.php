<?php 

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Admin\Http\Session;
use DB;

class RbacController extends Controller
{
	public function index()
	{
		//判断session中是否存在用户信息
		// if (request()->Session()->has('info')) {
			//获取用户信息
			// $info = request()->Session()->get('info');
		// }

		$id = 3;

		$admin_role = DB::table('admin_role')->where('admin_id', $id)->get();

		$object = $admin_role->first();
		
		$role_node = DB::table('role_node')->where('role_id', $object->role_id)->get();


		$relations = [];

		foreach ($role_node as $k => $v) {
			$relations[] = $v->node_id;
		}

		$node = DB::table('node')->whereIn('id', $relations)->get();
    
		$url = \Route::current()->getActionName();

    	$c = strtolower(substr($url, strrpos($url, '\\')+1));

    	$controller = substr($c, 0, strrpos($c, 'controller'));
    	$action = substr($c, strpos($c, '@')+1);
    	print_r($controller);
    	print_r($action);

		foreach ($node as $k => $v) {
			if ($v->node_controllers === $controller && $v->node_action === $action) {
				return redirect($controller/$action);
			}
		}
		echo "<script>alert('请先登录!!!')</script>";

		return redirect('admin/login');
		
	}
}


 ?>