<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\UploadedFile;

class FashionController extends Controller
{

	//首页

	public function index($parentId = 0){
		// $res = DB::table("sc_img")->orderBy('time','desc')->limit(3)->get();
		$res1 = DB::table("goods")->limit(8)->get();
		// $res2 = DB::table("sc_goods")->get();
		// $result = $this->list_level($res2,$pid=0,$level=0);

		
		return view('fashion/index',[ 'res1'=>$res1]);
	}

	public static function list_level($data,$pid,$level){

		static $array = array();

		foreach ($data as $k => $v) {
			
			if($pid == $v->pid){

				$v->level = $level;

				$array[] = $v;

				self::list_level($data,$v->id,$level+1);
			}
		}
		return $array;
	}


	//登录
	public function login(){
		Cookie::queue(\Cookie::forget('user'));
		if(request()->isMethod('post')){
			$data = request()->post();
			$res  = DB::table("sc_user")->where('Email',$data['Email'])->where('Password',$data['Password'])->first();

			

			if($res){
				//获取名称存入cookie
				$name = $res->LastName.$res->FirstName;
				Cookie::queue('user',$name, 60*24);
				$id = $res->id;
				Cookie::queue('user_id',$id, 60*24);

				return redirect('fashion/index');
			}else{
				echo "账号或密码错误";
			}
		}
	
		return view("fashion/account");
	}


	//注册
	public function signup(){

		return view("fashion/register");
	}

	public function signup_add(){
		$data = request()->post();
		$res = DB::table("sc_user")->insert($data);
		if ($res) {
			return redirect('fashion/login');
		}
	}

	//找回密码

	//找改的用户
	public function retrieve(){
	
		return view("fashion/retrieve");
	}

	public function updpwd(){
		$data = request()->post();
		$res  = DB::table("sc_user")->where('Email',$data['Email'])->first();

		//获取id存入cookie
		$id = $res->id;
		Cookie::queue('user_id',$id, 10);

		if ($res) {
			return redirect('fashion/retrieve_g');
		}else{
			return "用户名不存在";
		}

	}

	//输入新密码
	public function retrieve_g(){

		return view("fashion/retrieve_g");
	}

	public function updpwd_g(){
		$data = request()->post();

		$cookie = request()->cookie('user_id');
    	
    	//判断两次密吗是否一致
		if($data['Password']==$data['Password1']){
			$arr = [
				'Password'=>$data['Password'],
			];
			$res = DB::table("sc_user")->where('id','=',$cookie)->update($arr);
			
			if($res){
				return redirect('fashion/login');
			}

		}else{
			echo "两次密码不一样";
		}
	}

	//商品详细页
	public function single(){
		$id = $_GET['id'];
		$res = DB::table("sc_goods")->where("id",'=',$id)->orderBy('time','desc')->get();
		$res1 = DB::table("sc_goods")->where("stuts",'=','1')->orderBy('time','desc')->limit(3)->get();
		// $res2 = DB::table("sc_checkout")->where('goods_id'=>$id)->count();
		// var_dump($res2);die;
		//var_dump($res);die;
		return view('fashion/single',['res'=>$res,'res1'=>$res1]);
	}

	//购物车
	public function checkout_add(){
		
		$user_id = request()->cookie('user_id');
		//echo "123";
		$id = $_GET['id'];

		$res = DB::table("sc_goods")->where('id','=',$id)->first();

		$arr = [
			'user_id'=>$user_id,
			'goods_name'=>$res->name,
			'price'=>$res->price,
			'introduce'=>$res->introduce,
			'img'=>$res->img,
			'cont'=>1,
			'sum'=>$res->price,
		];
		// var_dump($res);
		// var_dump($arr);
		$data = DB::table("sc_checkout")->insert($arr);
	
		return redirect('fashion/index');	
	}


	public function checkout(){
		$user_id = request()->cookie('user_id');
		$res = DB::table("sc_checkout")->where('user_id','=',$user_id)->get();
		return view("fashion/checkout",['res'=>$res]);
	}

	public function changcheck(){

		$check = $_GET['check'];
		$sum = $_GET['sum'];
		$id = $_GET['id'];
		$res = DB::table("sc_checkout")->where('id','=',$id)->update(['cont'=>$check]);
		if($res){
			$data = DB::table("sc_checkout")->where('id','=',$id)->update(['sum'=>$sum]);
			if($data){
				return 1;
			}
			
		}
	}

	//删除购物车商品
	public function del(){
		$id = $_GET['id'];
		$res = DB::table("sc_checkout")->where("id",$id)->delete();
		if($res){
			return redirect('fashion/checkout');
		}
		

	}

	//商品
	public function products(){
		$res = DB::table("sc_goods")->where("stuts",'=','1')->orderBy('time','desc')->paginate(9);

		return view('fashion/products',['res'=>$res]);
	}

	//搜索
	public function seach(){
		$name = request()->get('name','');
		if($name==''){
			return redirect('fashion/index');
		}
		$res = DB::table("sc_goods")->where('name','like','%'.$name.'%')->get();

		return view('fashion/seach',['res'=>$res]);
	}

	//评论
	public function contact(){
		$goods_id = $_GET['id'];
		$res = DB::table("sc_goods")->where('id','=',$goods_id)->get();
		// var_dump($res);die;
		return view("fashion/contact",['res'=>$res]);
	}

	public function contact_add(){
		// $goods_id = $_post['id'];
		$data = request()->post();
		$arr = [
			'name'=>request()->cookie('user'),
			'goods_id'=>$data['id'],
			'message'=>$data['message'],
		];

		$res = DB::table("sc_contact")->insert($arr);
		//var_dump($res);
		if($res){
			return redirect('fashion/index');
	    }
	}
}