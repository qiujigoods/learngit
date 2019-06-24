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
		$id = request()->get('id');
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


}
