<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;

class WarehouseController extends Controller
{
	public function index()
	{
		$res = DB::table('warehouse')
							->paginate(10);
		$num = count($res);

		for ($i=0; $i < $num; $i++) { 

			$sku = $res[$i]->spec_array;
			/*var_dump($sku);*/
			$array = explode(',', $sku);
			/*var_dump($array);*/
			$sum = count($array);
			/*var_dump($sum);*/
			for ($j=0; $j < $sum; $j++) { 

				$data = DB::table('goods_attribute')->where('id',$array[$j])->get();

				$a[$i][] = $data[0]->attribute_value;
			}

			$b = implode(',', $a[$i]);

			$res[$i]->sku_array = $b;

		}

		return view('admin::warehouse/index',['res'=>$res]);
	}

	public function member_edit()
	{

		$id = request()->get('id');

		$res = DB::table('warehouse')->where('id',$id)->first();

		return view('admin::goods/member_edit',['res'=>$res]);
	}

	public function warehouse_up()
	{
		$file = request()->file('img');
		$data = request()->post();
		if ( $file->isValid()) { 
				//判断文件是否有效
		        $filename = $file->getClientOriginalName(); //文件原名称
		        $extension = $file->getClientOriginalExtension(); //扩展名
		        $filename = time() . "." . $extension;    //重命名
		        $url="E:\phpStudy\PHPTutorial\WWW\learngit\public\upload\logo";
		        $file->move($url, $filename); //移动至指定目录

		        $arr = [
		        	'name' => $data['name'],
		        	'img' => "../upload/logo/".$filename,
		        	'sell_price' => $data['sell_price'],
		        	'store_nums' => $data['store_nums'],
		        	'is_delivery_fee' => $data['is_delivery_fee'],
		        	'content' => $data['content']
		        	
		        ];

		        $res = DB::table('warehouse')->where('id',$data['id'])->update($arr);
		        if($res){
		        	return redirect('warehouse/index');
		        }
		}
	}


}