<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\UploadedFile;

class UserinfoController extends Controller
{

	public function userinfo()
	{
		$id = 1;
		$res = DB::table('user')->where('id',$id)->get();
		$profile = DB::table('member')->where('user_id',$id)->get();
		$pay_order = DB::table('order')->where('user_id',$id)->where('pay_status',1)->get();
		$order = DB::table('order')->where('user_id',$id)->where('pay_status',0)->get();

		$shopping = DB::table('goods_car')->where('user_id',$id)->get();

		$collect = DB::table('favorite')->where('user_id',$id)->get();

		$c_count = count($collect);
		for ($i=0; $i < $c_count; $i++) { 
			$c_data = DB::table('goods')->where('id',$collect[0]->rid)->first();
			if ($c_data) {
				$collect[$i]->goods_name = $c_data->name;
				$collect[$i]->img = $c_data->img;
			}
		}

		$s_count = count($shopping);
		for ($i=0; $i < $s_count; $i++) { 
			$s_data = DB::table('warehouse')->where('goods_no',$shopping[0]->content)->first();
			if ($s_data) {
				$shopping[$i]->goods_name = $s_data->name;
				$shopping[$i]->sell_price = $s_data->sell_price;
				$shopping[$i]->s_content = $s_data->content;
			}
		}

		$count = count($order);
		for ($i=0; $i < $count; $i++) { 

			$data = DB::table('order_goods')->where('order_id',$order[$i]->id)->first();

			if ($data) {
				$attr = DB::table('warehouse')->where('id',$data->product_id)->first();

				$order[$i]->goods_name = $attr->name;
			}
		}

		$pay_count = count($pay_order);
		for ($i=0; $i < $pay_count; $i++) { 

			$pay_data = DB::table('order_goods')->where('order_id',$pay_order[$i]->id)->first();

			if ($pay_data) {
				$pay_attr = DB::table('warehouse')->where('id',$pay_data->product_id)->first();

				$pay_order[$i]->goods_name = $pay_attr->name;
			}
		}

		return view('userinfo/userinfo',['res'=>$res,'profile'=>$profile,'pay_order'=>$pay_order,'order'=>$order,'shopping'=>$shopping,'collect'=>$collect]);
	}
}