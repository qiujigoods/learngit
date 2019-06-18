<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use Modules\Admin\Models\Type\Activity;
class ActiveController extends BaseController
{
	public function add()
	{
		return view('admin::active/add');
	}

	public function doAdd()
	{
		$name = $_POST['name'];
		$start_time = $_POST['start_time'];
		$end_time = $_POST['end_time'];
		$desc = $_POST['desc'];
		$status = $_POST['status'];

		// echo $name.$start_time.$end_time.$desc.$status;die;
		$res = DB::table('activity')->insert(['name'=>$name,'start_time'=>$start_time,'end_time'=>$end_time,'desc'=>$desc,'status'=>$status]);

		if($res){
			return redirect('active/index');
		}
	}

	public function index()
	{
		$user = new Activity();
		$data = $user->show();
		// $data = DB::table('activity')->get();

		return view('admin::active/index',['data'=>$data]);
	}

	public function del()
	{

		// echo 111;die;
		$id = $_GET['id'];

		// echo $id;die;
		$res = DB::table('activity')->where('id',$id)->delete();
		if($res){
			return redirect('active/index');
		}
	}

	public function upd()
	{
		$id = $_GET['id'];
		// echo $id;die;

		$res = DB::table('activity')->where('id',$id)->first();

		return view('admin::active/upd',['res'=>$res]);

	}

	public function doUpd()
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$start_time = $_POST['start_time'];
		$end_time = $_POST['end_time'];
		$desc = $_POST['desc'];
		$status = $_POST['status'];

		$arr = array('id'=>$id,'name'=>$name,'start_time'=>$start_time,'end_time'=>$end_time,'desc'=>$desc,'status'=>$status);

		$res = DB::table('activity')->where('id','=',$id)->update($arr);

		if($res){
			return redirect('active/index');
		}
	}
}