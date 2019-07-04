<?php 
namespace App\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ActivingController extends Controller
{
	//展示优惠券
	public function index()
	{
		$id = 1;

		$data = DB::table('coupon')->where('active_id', $id)->get();

		return view('activing/index',['data'=>$data]);
	}
	//领取优惠券
	public function join()
	{
		//获取优惠券id
		$data['coupon_id'] = request()->input('id');
		$data['user_id'] = request()->input('user_id');

		if (DB::table('coupon_log')->where('user_id', $data['user_id'])->first()) {
			echo "<script>alert('您已领取优惠券，请不要重复领取！');</script>";
			return redirect('activing/index');
		}

		if (DB::table('coupon_log')->insert($data)) {
			echo "<script>alert('领取优惠券成功！');</script>";
			return redirect('activing/index');
		}
		echo "<script>alert('领取优惠券失败');</script>";
		return redirect('activing/index');
	}

	//支付
	public function pay()
	{
		$user_id = 5;
		$money = 100;

		$data = $this->active($user_id, $money); 
		echo $data;
	}

	//使用优惠券
	public function active($user_id, $money)
	{
		$data = DB::table('coupon_log')->where('user_id', $user_id)->first();

		if (!empty($data)) {

			$coupon = DB::table('coupon')->where('id', $data->coupon_id)->first();

			if ($money>$coupon->total) {
			// echo "<pre>";
			// var_dump($coupon);die;
				DB::table('coupon_log')->where('id', $data->coupon_id)->update(['is_use'=>1]);
				return $money-$coupon->discount;
			}
		}
		return $money;
	}
}



 ?>