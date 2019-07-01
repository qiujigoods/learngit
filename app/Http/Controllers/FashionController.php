<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;

class FashionController extends Controller
{
	//首页
	public function index($parentId = 0){
		// $res = DB::table("sc_img")->orderBy('time','desc')->limit(3)->get();
		$res1 = DB::table("goods")->orderBy('sort')->limit(8)->get();
		// $res2 = DB::table("sc_goods")->get();
		// $result = $this->list_level($res2,$pid=0,$level=0);
		return view('fashion/index',['res1'=>$res1]);
	}

	//商品详细页
	public function single(){
		$id = 1;
		$res = DB::table("goods")->where("id",'=',$id)->orderBy('sort')->get();
		$res1 = DB::table("goods")->where("is_del",'=','1')->orderBy('sort')->limit(3)->get();
		$sku_value = DB::table("attr_class")->where("class_id",$res[0]->classification_id)->get();
		for ($i=0; $i < count($sku_value); $i++) { 
			$data = DB::table("attribute")->where("id",$sku_value[$i]->attr_id)->get();
			if ($data) {
				$sku[]=$data;
			}
		}
		
		$attr = DB::table("goods_attribute")->get();
		// $res2 = DB::table("sc_checkout")->where('goods_id'=>$id)->count();
		// var_dump($res2);die;
		//var_dump($res);die;
		return view('fashion/single',['res'=>$res,'res1'=>$res1,'sku'=>$sku,'attr'=>$attr]);
	}

	public function checkout(){
		// $user_id = request()->cookie('user_id');
		$user_id = 4;
		$res = DB::table("goods_car")->where('user_id','=',$user_id)->get();
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
