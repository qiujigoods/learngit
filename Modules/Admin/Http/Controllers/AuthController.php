<?php 

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AuthController extends Controller
{
	//展示
	public function index()
	{
		$data = DB::table('node')->paginate(10);

		$num = count($data);

		return view('admin::auth/index', ['data'=>$data, 'num'=>$num]);
	}

	//添加
	public function add()
	{
		if (request()->isMethod('post')) {
			$data = request()->post();

			if (DB::table('node')->where('node_name', $data['node_name'])->first()) {
				echo "<script>alert('该权限已创建');</script>";
			}

			$res = DB::table('node')->insert($data);

			if ($res) {
				return redirect('auth/index');
			}
		}
		return view('admin::auth/add');
	}

	//删除
	public function del()
	{
		if (request()->isMethod('get')) {
			$id = request()->input('id');

			if (DB::table('node')->where('id', $id)->delete()) {
				return redirect('auth/index');
			}
		}
	}

	//编辑
	public function save()
	{
		if (request()->isMethod('get')) {
			$id = request()->input('id');

			$data = DB::table('node')->where('id', $id)->first();

			if ($data) {
				return view('admin::auth/save', ['data'=>$data]);
			}
		}

		if (request()->isMethod('post')) {
			$data = request()->input();

			$res = DB::table('node')->where('id', $data['id'])->update(['node_name'=>$data['node_name'], 'node_controllers'=>$data['node_controllers'], 'node_action'=>$data['node_action']]);

			if ($res) {
				return redirect('auth/index');
			}
		}
	}

	//角色授权
	public function empower()
	{
		if (request()->isMethod('post')) {
			$data = request()->post();
			
			$relations = [];
            $relation['role_id'] = $data['role_id'];

            unset($data['role_id']);

            foreach ($data as $k => $v) {
                $relation['node_id'] = $v;
                $relations[] = $relation;
            }
            
            DB::table('role_node')->insert($relations);
            
            return redirect('auth/index');
		}

		$role = DB::table('role')->get();
		$auth = DB::table('node')->get();

		return view('admin::auth/empower', ['role'=>$role, 'auth'=>$auth]);
	}
}

 ?>