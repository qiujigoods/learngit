<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\UploadedFile;

class FadminController extends Controller
{	
	public function index(){
		return view('fadmin/index');
	}

	//轮播图
	public function rotation_chart(){

		return view("fadmin/rotation");
	}

	//上传一张图片
	public function rotation_u(){

		$file = request()->file('files');
		if ( $file->isValid()) { 
		//判断文件是否有效
	        $filename = $file->getClientOriginalName(); //文件原名称
	        $extension = $file->getClientOriginalExtension(); //扩展名
	        $filename = time() . "." . $extension;    //重命名
	        $url="E:/phpStudy/PHPTutorial/WWW/laravel/public/images";
	        $file->move($url, $filename); //移动至指定目录

	        $data = [
	        	'img_name'=>$filename,
	        	'img'=>$url."/".$filename,
	        	'time'=>time(),
	        ];

	        $res = DB::table("sc_img")->insert($data);
	        if($res){
	        	return redirect('fadmin/index');
	        }
    	}
	}

	//添加商品
	public function goods(){

		$res = DB::table("sc_goods")->where('stuts','=','0')->get();
		$res1 = DB::table("sc_goods")->where('stuts','=','2')->get();
		return view('fadmin/goods',['res'=>$res,'res1'=>$res1]);
	}
	public function add_goods(){
		$file = request()->file('img');
		$data = request()->post();
		//var_dump($data);die;
		if ( $file->isValid()) { 
		//判断文件是否有效
	        $filename = $file->getClientOriginalName(); //文件原名称
	        $extension = $file->getClientOriginalExtension(); //扩展名
	        $filename = time() . "." . $extension;    //重命名
	        $url="E:/phpStudy/PHPTutorial/WWW/laravel/public/images";
	        $file->move($url, $filename); //移动至指定目录

	        $arr = [
	        	'pid'=>$data['type'],
	        	'name'=>$data['name'],
	        	'price'=>$data['price'],
	        	'introduce'=>$data['introduce'],
	        	'img'=>$filename,
	        	'time'=>time(),
	        	'stuts'=>$data['stuts'],
	        ];

	        $res = DB::table("sc_goods")->insert($arr);
	        if($res){
	        	return redirect('fadmin/index');
	        }
	       
	    }
	}

	public function contact(){
		$res = DB::table("sc_contact")->get();

		return view('fadmin/contact',['res'=>$res]);
	}
}