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

			if (DB::table('admin')->insert($data)) {
				return redirect('/admin');
			}
		}

		return view('register/register');
	}
}


 ?>