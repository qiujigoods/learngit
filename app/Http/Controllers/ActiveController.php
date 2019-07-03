<?php 
namespace App\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ActiveController extends Controller
{
	//展示优惠券
	public function index()
	{
		$id = request()->input('id');

		$data = DB::table('coupon')->where('active_id', $id)->get();

		return 1;
	}
	//领取优惠券
	public function join()
	{
		//获取优惠券id
		$data['coupon_id'] = request()->input('id');

		//获取用户id
		$info = session::get('info');
		$data['user_id'] = $info['id'];

		if (DB::table('coupon_log')->where('user_id', $data['user_id'])->first()) {
			echo "<script>alert('您已领取优惠券，请不要重复领取！');</script>";
		}

		if (DB::tabel('coupon_log')->insert($data)) {
			echo "<script>alert('领取优惠券成功！');</script>";
		}
		echo "<script>alert('领取优惠券失败');</script>";
	}

	//支付
	public function pay()
	{
		$user_id = 5;
		$money = 300;

		$data = $this->active($user_id, $money); 
	}

	//使用优惠券
	public function active($user_id, $money)
	{
		$data = DB::tabel('coupon_log')->where('user_id', $user_id)->first();

		if (!empty($data)) {

			$coupon = DB::table('coupon')->where('id', $data['coupon_id'])->first();

			if ($money>$total) {
				return $money-$coupon['discount'];
			}
		}
		return $money;
	}
}



 ?>