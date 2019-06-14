<?php 

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller
{
	//展示
	public function index()
	{
		$data = DB::table('role')->paginate(10);

		$num = count($data);

		return view('admin::role/index', ['data'=>$data, 'num'=>$num]);
	}

	//添加
	public function add()
	{
		if (request()->isMethod('post')) {
			$data = request()->post();

			//角色名称唯一
			if (DB::table('role')->where('role_name', $data['role_name'])->first()) {
				echo "<script>alert('该角色已添加');</script>";
			}

			$data['createtime'] = time();

			$res = DB::table('role')->insert($data);

			if ($res) {
				return redirect('role/index');
			}
		}
		return view('admin::role/add');
	}

	//删除
	public function del()
	{
		if (request()->isMethod('get')) {
			$id = request()->input('id');

			if (DB::table('role')->where('id', $id)->delete()) {
				return redirect('role/index');
			}
		}
	}

	//编辑
	public function save()
	{
		if (request()->isMethod('get')) {
			$id = request()->input('id');

			$data = DB::table('role')->where('id', $id)->first();

			if ($data) {
				return view('admin::role/save', ['data'=>$data]);
			}
		}

		if (request()->isMethod('post')) {
			$data = request()->input();

			$res = DB::table('role')->where('id', $data['id'])->update(['role_name'=>$data['role_name'], 'desc'=>$data['desc']]);

			if ($res) {
				return redirect('role/index');
			}
		}
	}

	//角色定位
	public function definition()
	{
		if (request()->isMethod('post')) {
			$relation = request()->post();

			if (DB::table('admin_role')->insert($relation)) {
				return redirect('role/index');
			}
		}

		$role = DB::table('role')->get();
		$admin = DB::table('admin')->get();

		return view('admin::role/definition', ['admin'=>$admin, 'role'=>$role]);
	}
}

 ?>