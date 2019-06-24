<?php 

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class GoodsController extends Controller
{
	//分类商品列表
	public function index()
	{
		$type = DB::table('category')->get();

		if ($type) {
			return json_encode(array(['code'=>1, 'msg'=>'获取成功', 'result'=>$type]));
		}

		return json_encode(array(['code'=>0, 'msg'=>'获取失败']));
	}

	//商品详情页
	public function detail()
	{
		if (request()->isMethod('get')) {
			$id = request()->input('id');

			$check = $this->check();

			if ($check) {
				$detail = DB::table('goods')->where('id', $id)->find();

				if ($detail) {
					return json_encode(array(['code'=>1, 'msg'=>'获取商品详情成功', 'result'=>$detail]));
				}

				return json_encode(array(['code'=>0, 'msg'=>'获取商品详情失败']));
			}

			return json_encode(array(['code'=>0, 'msg'=>'验证用户信息失败']));
		}
	}

	//加入购物车
	public function join()
	{
		if (request()->isMethod('post')) {
			$data = request()->post();

			$check = $this->$check();

			if ($check) {
				$data['user_id'] = $check['result']->user_id;
				$data['create_time'] = time();

				if (DB::table('goods_car')->insert($data)) {
					return json_encode(array(['code'=>1, 'msg'=>'加入购物车成功']));
				}

				return json_encode(array(['code'=>0, 'msg'=>'加入购物车失败']));
			}

			return json_encode(array(['code'=>0, 'msg'=>'验证用户信息失败']));
		}
	}

	//添加收藏
	public function collect()
	{
		if (request()->isMethod('get')) {
			$data['rid'] = request()->input('rid');

			$check = $this->$check();

			if ($check) {
				$data['user_id'] = $check['result']->user_id;
				$data['time'] = time();

				if (DB::table('favorite')->insert($data)) {
					return json_encode(array(['code'=>1, 'msg'=>'收藏成功']));
				}

				return json_encode(array(['code'=>0, 'msg'=>'收藏失败']));
			}

			return json_encode(array(['code'=>0, 'msg'=>'验证用户信息失败']));
		}
	}

	//立即购买
	public function buy()
	{
		if (request()->isMethod('post')) {
			$data = request()->post();

			$check = $this->$check();

			if ($check) {
				//调用支付接口 **************
				$pay = $this->pay();

				if ($pay['msg'] == '支付成功') {
					return json_encode(array(['code'=>1, 'msg'=>'立即购买成功']));
				}

				return json_encode(array(['code'=>0, 'msg'=>'立即购买失败']));
			}

			return json_encode(array(['code'=>0, 'msg'=>'验证用户信息失败']));
		}
	}

	//购物车列表
	public function goodlist()
	{
		if (request()->isMethod('get')) {
			$check = $this->$check();

			if ($check) {
				$data = DB::table('goods_car')->paginate(10);

				if ($data) {
					return json_encode(array(['code'=>1, 'msg'=>'获取列表成功', 'result'=>$data]));
				}

				return json_encode(array(['code'=>0, 'msg'=>'获取列表失败']));
			}

			return json_encode(array(['code'=>0, 'msg'=>'验证用户信息失败']));
		}
	}

	//去结算
	public function balance()
	{
		if (request()->isMethod('post')) {
			$data = request()->post();

			$check = $this->$check();

			if ($check) {
				//调用支付接口 **************
				$pay = $this->pay($data);

				if ($pay['msg'] == '支付成功') {

					if (DB::table('goods_car')->where('user_id', $check['result']->user_id)->update(['is_pay'=>1])) {
						return json_encode(array(['code'=>1, 'msg'=>'结算成功']));
					}
					
					return json_encode(array(['code'=>0, 'msg'=>'结算失败']));
				}
			}

			return json_encode(array(['code'=>0, 'msg'=>'验证用户信息失败']));
		}
	}

	//删除
	public function delete()
	{
		if (request()->isMethod('get')) {
			$rid = request()->input('rid');

			$check = $this->$check();

			if ($check) {
				$data = DB::table('goods_car')->where('user_id', $check['result']->user_id)->where('rid', $rid)->delete();

				if ($data) {
					return json_encode(array(['code'=>1, 'msg'=>'删除成功']));
				}

				return json_encode(array(['code'=>0, 'msg'=>'删除失败']));
			}

			return json_encode(array(['code'=>0, 'msg'=>'验证用户信息失败']));
		}
	}

	//数量修改
	public function number()
	{
		if (request()->isMethod('post')) {
			$data = request()->post();

			$check = $this->$check();

			if ($check) {
				$data = DB::table('goods_car')->where('user_id', $check['result']->user_id)->where('rid', $data['rid'])->update(['num'=>$data['num']]);

				if ($data) {
					return json_encode(array(['code'=>1, 'msg'=>'修改数量成功']));
				}

				return json_encode(array(['code'=>0, 'msg'=>'修改数量失败']));
			}

			return json_encode(array(['code'=>0, 'msg'=>'验证用户信息失败']));
		}
	} 

	//下单接口
	public function true()
	{
		if (condition) {
			# code...
		}
	}

	//调用第三方接口支付接口
	// public function pay()
	// {
	// 	$url = 'https://openapi.alipay.com/gateway.do';
	// }

	//token验证
	public function check()
	{
		$token = request()->input('token');

		$info = DB::table('member')->where('token', $token)->find();

		$time = time();
		if ($info->logintime+2*60*60>$time) {
			return json_encode(array(['code'=>1, 'msg'=>'token令牌正常', 'result'=>$info]));
		}
		return json_encode(array(['code'=>0, 'msg'=>'token已过期']));
	}
}


 ?>