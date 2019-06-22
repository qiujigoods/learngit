<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use App\Models\Fl\Fl;
class FlController extends BaseController
{
	public function showType()
	{
		// echo 111;die;
		$model = Fl::ShowType();

		return view('flc/index',['typeList'=>$model]);
	}

	// public function delFl()
	// {
	// 	$id = $_GET['id'];
	// 	// echo $id;die;
	// 	$category = new Fl();
	// 	$res = $category->delFl($id);

	// 	if($res){
	// 		return redirect('classShow');
	// 	}
	// }

	// public function updFl()
	// {
	// 	$id = $_GET['id'];
	// 	// echo $id;
	// 	$res = DB::table('category')->where('id',$id)->first();

	// 	return view('flc/update',['res'=>$res]);
	// }

	// public function doUpdate()
	// {
	// 	$id = $_POST['id'];
	// 	$name = $_POST['name'];
	// 	$keywords = $_POST['keywords'];
	// 	$descript = $_POST['descript'];
	// 	$title = $_POST['title'];
	// 	$sort = $_POST['sort'];

	// 	$arr = array('id'=>$id,'name'=>$name,'keywords'=>$keywords,'descript'=>$descript,'title'=>$title,'sort'=>$sort);

	// 	$res = DB::table('category')->where('id','=',$id)->update($arr);

	// 	if($res){
	// 		return redirect('classShow');
	// 	}
	// }

	// public function add()
	// {
	// 	// echo 11;
	// 	$model = Fl::ShowType();

	// 	return view('flc/add',['typeList'=>$model]);
	// }

	// public function doAdd()
	// {
	// 	$name = $_POST['name'];
	// 	$parent_id = $_POST['parent_id'];
	// 	$keywords = $_POST['keywords'];
	// 	$descript = $_POST['descript'];
	// 	$title = $_POST['title'];
	// 	$sort = $_POST['sort'];

	// 	$res = DB::table('category')->insert(['name'=>$name,'parent_id'=>$parent_id,'keywords'=>$keywords,'descript'=>$descript,'title'=>$title,'sort'=>$sort]);

	// 	if($res){
	// 		return redirect('classShow');
	// 	}
	// }

}
