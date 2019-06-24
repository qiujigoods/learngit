<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
	public function login()
	{
		Cookie::queue(\Cookie::forget('user'));
		if(request()->isMethod('post')){
			$data = request()->post();
			$res  = DB::table("user")
								->where('username',$data['username'])
								->where('password',md5($data['password']))
								->first();

			//var_dump($res);die;

			if($res){
				//获取名称存入cookie
				$name = $res->username;
				Cookie::queue('user',$name, 60*24);
				$id = $res->id;
				Cookie::queue('user_id',$id, 60*24);

				return redirect('index');
			}else{
				echo "账号或密码错误";
			}
		}
		return view('login/account');
	}

	//注册
	public function signup()
	{
		return view("login/register");
	}

	public function signup_add()
	{
		$data = request()->post();
		$res = DB::table("user")->get();
		//var_dump($res);die;
		foreach ($res as $key => $v) {
			if($v->username==$data['username']){
				echo '用户名已存在';die;
			}
		}
		//var_dump($data);die;
		if($data['password']==$data['lastpwd']){
			$file = request()->file('head_ico');
			if ( $file->isValid()) { 
			//判断文件是否有效
		        $filename = $file->getClientOriginalName(); //文件原名称
		        $extension = $file->getClientOriginalExtension(); //扩展名
		        $filename = time() . "." . $extension;    //重命名
		        $url="E:/phpStudy/PHPTutorial/WWW/laravel/public/images";
		        $file->move($url, $filename); //移动至指定目录

		        $arr = [
		        	'username'=>$data['username'],
		        	'password'=>md5($data['password']),
		        	'head_ico'=>"../".$filename,
					'time'=>date('Y-m-d H:i:s'),
		        ];

		        $res = DB::table("user")->insert($arr);
				if ($res) {
					return redirect('login/login');
				}
		    }
		}
	}

	//找改的用户
	public function retrieve()
	{
	
		return view("login/retrieve");
	}

	public function updpwd()
	{
		$data = request()->post();
		$res  = DB::table("user")->where('username',$data['username'])->first();

		//获取id存入cookie
		$id = $res->id;
		Cookie::queue('user_id',$id, 10);

		if ($res) {
			return redirect('login/retrieve_g');
		}else{
			return "用户名不存在";
		}

	}

	//输入新密码
	public function retrieve_g(){

		return view("login/retrieve_g");
	}

	public function updpwd_g(){
		$data = request()->post();

		$cookie = request()->cookie('user_id');
    	
    	//判断两次密吗是否一致
		if($data['Password']==$data['Password1']){
			$arr = [
				'Password'=>md5($data['Password']),
			];
			$res = DB::table("user")->where('id','=',$cookie)->update($arr);
			
			if($res){
				return redirect('login/login');
			}

		}else{
			echo "两次密码不一样";
		}
	}
}