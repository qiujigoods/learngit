<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
	public function index()
	{
		$res = DB::table('brand')
							->orderBy('sort')
							->paginate(10);
		return view('admin::brand/index',['res'=>$res]);
	}

	public function add()
	{	
		$file = request()->file('logo');
		if(request()->isMethod('post')){
			$data = request()->post();
			if ( $file->isValid()) { 
				//判断文件是否有效
		        $filename = $file->getClientOriginalName(); //文件原名称
		        $extension = $file->getClientOriginalExtension(); //扩展名
		        $filename = time() . "." . $extension;    //重命名
		        $url="E:\phpStudy\PHPTutorial\WWW\learngit\public\upload\logo";
		        $file->move($url, $filename); //移动至指定目录

		        $arr = [
		        	'name'=>$data['name'],
		        	'logo'=>"../upload/logo/".$filename,
		        	'url'=>$data['url'],
		        	'description'=>$data['description'],
		        	'category_ids'=>$data['category_ids'],
		        ];

		        $res = DB::table('brand')->insert($arr);

		        if($res){
		        	return redirect('brand/index');
		        }
		  
    		}
		}else{
			return view('admin::brand/member-add');
		}	
	}

	public function brandDel()
	{
		$id = request()->get('id');
		$res = DB::table('brand')->where('id',$id)->delete();

		if($res){
			return redirect('brand/index');
		}
	}

	public function brandUpd()
	{
		// echo "123";die;
		$id = request()->get('id');
		$res = DB::table('brand')->where('id',$id)->first();
		return view('admin::brand/member-upd',['res'=>$res]);
	}

	public function brandUpdate()
	{
		$data = request()->post();
		$res = DB::table('brand')
							->where('id',$data['id'])
							->update($data);

		if($res){
			return redirect('brand/index');
		}
	}



}