<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
	public function pass()
	{
		$res = DB::table('comment')
							->join('goods' ,'comment.goods_id' ,'=' ,'goods.id')
							->join('user' ,'comment.user_id' ,'=' ,'user.id')
							->paginate(10);
		//var_dump($res);die;
		return view('admin::customer/customer-list',['res'=>$res]);
	}	

	public function comment()
	{
		if(request()->isMethod('post')){
			$data = request()->post();
			$arr = [
				'recontents'=>$data['recontents'],
				'recomment_time'=>time(),
			];

			$res = DB::table('comment')->where('id',$data['id'])->update($arr);
		}else{
			return view('admin::customer/customer-add');
		}
	}

	public function feedback()
	{
		$res = DB::table('comment')
							->join('goods' ,'comment.goods_id' ,'=' ,'goods.id')
							->join('user' ,'comment.user_id' ,'=' ,'user.id')
							->paginate(10);
		//var_dump($res);die;					
		return view('admin::customer/customer-feedback',['res'=>$res]);
	}

	public function reply()
	{
		$res = DB::table('comment')
							->join('seller' ,'comment.seller_id' ,'=' ,'seller.id')
							->join('user' ,'comment.user_id' ,'=' ,'user.id')
							->paginate(10);
		//var_dump($res);die;					
		return view('admin::customer/customer-reply',['res'=>$res]);
	}
}