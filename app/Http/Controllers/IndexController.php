<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
	public function login()
	{
		if(request()->isMethod('post')){
			$data = request()->post();
			if($data['luotest_response']==''){
				 echo "验证错误";die;
			}

			//var_dump($data['password']);die;
			$res  = DB::table("admin")
								->where('admin_name',$data['admin_name'])
								->where('password',md5($data['password']))
								->where('is_del','0')
								->first();
			if($res){
				return redirect('index/index');
			}else{
				echo "账号或密码错误";die;
			}
		}
		
	}

	public function index(){
		return view('index/index');
	}
}