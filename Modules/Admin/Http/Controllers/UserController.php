<?php 

namespace Modules\Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Request;
use DB;

class UserController extends Controller
{
	//展示
	public function index()
	{
		$data = DB::table('admin')->where('is_del', 0)->paginate(10);

		$num = count($data);

		return view('admin::user/index', ['data'=>$data, 'num'=>$num]);
	}

	//添加
	public function add()
	{
		if (request()->isMethod('post')) {
			$data = request()->post();

			$data['password'] = md5($data['password']);

			//邮箱唯一
			if (DB::table('admin')->where('email', $data['email'])->first()) {
				echo "<script>alert('邮箱已注册');</script>";
			}

			$data['create_time'] = time();

			$res = DB::table('admin')->insert($data);

			if ($res) {
				return redirect('user/index');
			}
		}
		return view('admin::user/add');
	}

	//删除
	public function del()
	{
		if (request()->isMethod('get')) {
			$id = request()->input('id');

			if (DB::table('admin')->where('id', $id)->update(['is_del'=>1])) {
				return redirect('user/index');
			}
		}
	}

	//编辑
	public function save()
	{
		if (request()->isMethod('get')) {
			$id = request()->input('id');

			$data = DB::table('admin')->where('id', $id)->first();

			if ($data) {
				return view('admin::user/save', ['data'=>$data]);
			}
		}

		if (request()->isMethod('post')) {
			$data = request()->input();

			$res = DB::table('admin')->where('id', $data['id'])->update(['admin_name'=>$data['admin_name'], 'phone'=>$data['phone'], 'email'=>$data['email'], 'nickname'=>$data['nickname'], 'password'=>$data['password']]);

			if ($res) {
				return redirect('user/index');
			}
		}
	}
}

 ?>