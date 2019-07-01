<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;

class GoodsController extends Controller
{
	public function index()
	{
		$res = DB::table('goods')
							->orderBy('sort')
							->paginate(10);

		return view('admin::goods/index',['res'=>$res]);
	}

	public function add()
	{
		$res = DB::table('classification')
							->where('parent_id',0)
							->get();

		return view('admin::goods/add',['res'=>$res]);
	}

	public function sel()
	{
		$id = $_GET['id'];
		$res = DB::table('classification')
							->where('parent_id',$id)
							->get();

		return json_encode($res);
	}

	public function selval()
	{
		$id = $_GET['id'];
		$res = DB::table('attr_class')
							->where('class_id',$id)
							->get();

		$data =  DB::table('attribute')->get();
		$val = DB::table('goods_attribute')->get();

		return [$res,$data,$val];
	}

	public function add_sku()
	{
		$seller_id = 1;

		$title = $_GET['title'];
		$sel = $_GET['sel'];
		$sku = $_GET['data'];
		$market_price = $_GET['market_price'];
		$cost_price = $_GET['cost_price'];
		$up_time = $_GET['up_time'];
		$down_time = $_GET['down_time'];
		$keywords = $_GET['keywords'];
		$unit = $_GET['unit'];
		$search_words = $_GET['search_words'];
		$description = $_GET['description'];
		$content = $_GET['content'];
		$goods_no = "BXX_".date("YmdHis").rand(111111,999999);
		$is_delivery_fee = $_GET['is_delivery_fee'];

		$num = count($sku);
		echo "<pre>";
		$values = array_values($sku);
/*		var_dump($values[1]);*/
		$keys = array_keys($sku);
		/*var_dump($keys[0]);*/

		$res = [
				'name' => $title,
				'classification_id' => $sel,
				'brand_id' => $sel,
				'market_price' => $market_price,
				'cost_price' => $cost_price,
				'up_time' => $up_time,
				'down_time' => $down_time,
				'keywords' => $keywords,
				'unit' => $unit,
				'search_words' => $search_words,
				'description' => $description,
				'content' => $content,
				'create_time' => date('Y-m-d H:i:s'),
				'goods_no' => $goods_no,
				'seller_id' => $seller_id,
				'is_delivery_fee' => $is_delivery_fee,
				'is_del' => 0,
				'grade' => 0,
				'sale' => 0,
				'comments' => 0,
				'sort' => 99,
				'favorite' => 0,
				'visit' => 0

			];
			DB::table('goods')->insert($res);


		for ($i=0; $i < $num; $i++) { 
			$data = [
				'name' => $title,
				'brand_id' => $sel,
				'spec_array' => $keys[$i],
				'sell_price' => $values[$i]['skuPrice'],
				'store_nums' => $values[$i]['skuStock'],
				'market_price' => $market_price,
				'cost_price' => $cost_price,
				'unit' => $unit,
				'content' => $content,
				'up_time' => date('Y-m-d H:i:s'),
				'goods_no' => $goods_no.$i,
				'seller_id' => $seller_id,
				'is_delivery_fee' => $is_delivery_fee,
				'is_del' => 0
			];
			DB::table('warehouse')->insert($data);
		}
		return 1;
	}

	public function member_edit()
	{

		$id = request()->get('id');

		$res = DB::table('goods')->where('id',$id)->first();

		return view('admin::goods/member_edit',['res'=>$res]);
	}

	public function goods_up()
	{
		$file = request()->file('img');
		$data = request()->post();
		if ( $file->isValid()) { 
				//判断文件是否有效
		        $filename = $file->getClientOriginalName(); //文件原名称
		        $extension = $file->getClientOriginalExtension(); //扩展名
		        $filename = time() . "." . $extension;    //重命名
		        $url="E:\phpStudy\PHPTutorial\WWW\learngit\public\upload";
		        $file->move($url, $filename); //移动至指定目录

		        $arr = [
		        	'name' => $data['name'],
		        	'img' => "../upload/".$filename,
		        	'market_price' => $data['market_price'],
		        	'cost_price' => $data['cost_price'],
		        	'up_time' => $data['up_time'],
		        	'down_time' => $data['down_time'],
		        	'content' => $data['content']
		        	
		        ];

		        $res = DB::table('goods')->where('id',$data['id'])->update($arr);
		        if($res){
		        	return redirect('goods/index');
		        }
		}
	}
}