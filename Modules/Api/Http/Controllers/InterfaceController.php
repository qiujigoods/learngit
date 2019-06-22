<?php 

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class InterfaceController extends Controller
{
	//分类商品列表
	public function index()
	{
		// $check = $this->check();
		$type = DB::table('category')->paginate(10);

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
				$detail = DB::table('goods')->where('id', $id)->get();

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

			$check = $this->check();

			if ($check) {
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
		if (request()->isMethod('post')) {
			$data = request()->post();

			$check = $this->check();

			if ($check) {
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

			$check = $this->check();

			if ($check) {

				if (DB::table('order')->insert($data)) {

					$order = DB::table('order')->where('user_id', $data['user_id'])->first();

					return json_encode(array(['code'=>1, 'msg'=>'立即购买', 'result'=>$order]));
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

			$check = $this->check();

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

			$check = $this->check();

			if ($check) {

				if (DB::table('goods_car')->where('user_id', $data['user_id'])->where('content',$data['content'])->first())
				{
					return json_encode(array(['code'=>1, 'msg'=>'是否结算?']));
				}
				return json_encode(array(['code'=>0, 'msg'=>'结算失败']));
			}

			return json_encode(array(['code'=>0, 'msg'=>'验证用户信息失败']));
		}
	}

	//删除
	public function delete()
	{
		if (request()->isMethod('get')) {
			$id = request()->input('user_id');
			$content = request()->input('content');

			$check = $this->check();

			if ($check) {
				$data = DB::table('goods_car')->where('user_id', $id)->where('content', $content)->delete();

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

			$check = $this->check();

			if ($check) {
				$data = DB::table('goods_car')->where('user_id', $data['user_id'])->where('content', $data['content'])->update(['num'=>$data['num']]);

				if ($data) {
					return json_encode(array(['code'=>1, 'msg'=>'修改数量成功']));
				}

				return json_encode(array(['code'=>0, 'msg'=>'修改数量失败']));
			}

			return json_encode(array(['code'=>0, 'msg'=>'验证用户信息失败']));
		}
	} 

	//活动接口
	public function active()
	{
		if (request()->isMethod('get')) {
			$name = request()->input('name');

			$check = $this->check();

			if ($check) {

				$active = $this->$name();

				if ($active) {
					return json_encode(array(['code'=>1, 'msg'=>'进入活动', 'result'=>$active]));
				}

				return json_encode(array(['code'=>0, 'msg'=>'进入活动失败']));
			}

			return json_encode(array(['code'=>0, 'msg'=>'验证用户信息失败']));
		}
	}

	public function shiyi()
	{
		return 999;
	}

	//token验证
	public function check()
	{
		$token = request()->input('token');

		$info = DB::table('user')->where('token', $token)->get();

		if ($info) {
			return json_encode(array(['code'=>1, 'msg'=>'token令牌正常']));
		}
	}
}


 ?>