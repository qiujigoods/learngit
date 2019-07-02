<?php 

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;


class RegisterController extends BaseController
{
	public function register()
	{
		if (request()->isMethod('post')) {

			$data = request()->post();

			$data['password'] = md5($data['password']);

			$data['create_time'] = time();

			if (DB::table('admin')->where('phone', $data['phone'])->first()) {
				echo "该手机号已注册";die;
			}

			if (DB::table('admin')->where('email', $data['email'])->first()) {
				echo "该邮箱已注册";die;
			}

			if (DB::table('admin')->insert($data)) {
				return redirect('/admin');
			}
		}

		return view('register/register');
	}
}


 ?>