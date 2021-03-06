<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
	public function index()
	{
		$res = DB::table('order')
							->join('user','order.user_id','=','user.id')
							->paginate(10);
		//var_dump($res);die;
		return view('admin::order/list',['res'=>$res]);
	}

	public function details()
	{
		$id = request()->get('id');
		$res = DB::table('order')
							->join('user','order.user_id','=','user.id')
							->where('order.id','=',$id)
							->first();

		return view('admin::order/details',['res'=>$res]);
	}

	public function statusindex()
	{
		$res = DB::table('order')
							->join('user','order.user_id','=','user.id')
							->paginate(10);
		return view('admin::order/statusindex',['res'=>$res]);
	}

	public function statusDel()
	{
		$id = request()->get('id');
		//var_dump($id);die;
		$res = DB::table('order')->where('id',$id)->delete();

		if($res){
			return redirect('order/statusindex');
		}
	}

	public function statusUpdate()
	{
		if(request()->isMethod('post')){
			$data = request()->post();

			$res = DB::table('order')->where('id',$data['id'])->update(['status'=>$data['status']]);
			if($res){
				echo '修改成功';
			}
		}else{
			return view('admin::order/update');
		}
	}

	public function orderUserUpdate()
	{
		$id = $_GET['id'];
		// echo $id;
		$res = DB::table('order')->where('id',$id)->first();

		return view('admin::order/userupdate',['res'=>$res]);
	}

	public function doUserUpdate()
	{
		$id = $_POST['id'];
		$accept_name = $_POST['accept_name'];
		$telphone = $_POST['telphone'];
		$postscript = $_POST['postscript'];
		$postcode = $_POST['postcode'];
		$address = $_POST['address'];

		$arr = array('id'=>$id,'accept_name'=>$accept_name,'telphone'=>$telphone,'postscript'=>$postscript,'postcode'=>$postcode,'address'=>$address);

		$res = DB::table('order')->where(['id'=>$id])->update($arr);

		if($res){
			return redirect('order/index');
		}
		// echo $accept_name;
	}

}