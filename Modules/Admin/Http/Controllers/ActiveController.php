<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use Modules\Admin\Models\Type\Activity;
use App\Http\Request;
use Illuminate\Support\Facades\Redis;

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
	public function seckill()
	{
		$data = DB::table('ih_store')
		->join('ih_goods', 'ih_store.id', '=', 'ih_goods.goods_id')
		->get();
		// var_dump($data);exit;
		return view('admin::active/seckill',['data'=>$data]);
	}
	public function addkill()
	{
		return view('admin::active/addkill');
	}
	public function doAddKill()
	{
		$file = request()->file('img');
		$data = request()->post();
		if ( $file->isValid()) { 
				//判断文件是否有效
		        $filename = $file->getClientOriginalName(); //文件原名称
		        $extension = $file->getClientOriginalExtension(); //扩展名
		        $filename = time() . "." . $extension;    //重命名
		        $url='D:\software\everything\laragon\www\learngit\public\images';
		        $file->move($url, $filename); //移动至指定目录

		        $arr = [
		        	'goods_name' => $data['goods_name'],
		        	'img' => "../images/".$filename,
		        	'cat_id' => '0'
		        	
		        ];
		        $res = DB::table('ih_goods')->insert($arr);
		        $id = DB::table('ih_goods')->max('goods_id');
		        $arr1 = [
		        	'id' => $id,
		        	'sku_id' => 13,
		        	'freez' => $data['freez'],
		        	'number' => $data['number']
		        ];
		        $res2 = DB::table('ih_store')->insert($arr1);
		        if($res && $res2){
		        	// return redirect('goods/index');
		        	// echo '成功';
		        	$store=(int)$data['number'];
		        	$name = $data['goods_name'];
		        	// var_dump($store);exit;
					for($i=0;$i<$store;$i++){
					    Redis::lpush($name,1);
					}
					// echo $redis->llen('goods_store');
					echo "<script>alert('添加成功')</script>";
					return redirect('active/seckill');

		        }else{
		        	echo $id;
		        }
		}
	}
}