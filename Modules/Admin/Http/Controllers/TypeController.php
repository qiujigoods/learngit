<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use Modules\Admin\Models\Type\Type;
class TypeController extends BaseController
{
	public function index()
	{
		// echo 111;die;
		$model = Type::ShowType();

		return view('admin::type/index',['typeList'=>$model]);
	}

	public function delFl()
	{

		// echo 11;die;
		$id = $_GET['id'];
		// echo $id;die;

		$category = new Type();
		$res = $category->delFl($id);

		if($res){
			return redirect('type/index');
		}
	}

	public function updFl()
	{
		// echo 11;die;
		$id = $_GET['id'];
		// echo $id;
		$res = DB::table('category')->where('id',$id)->first();

		return view('admin::type/update',['res'=>$res]);
	}

	public function doUpdate()
	{

		// echo 111;die;
		$id = $_POST['id'];
		$name = $_POST['name'];
		$keywords = $_POST['keywords'];
		$descript = $_POST['descript'];
		$title = $_POST['title'];
		$visibility = $_POST['visibility'];
		$sort = $_POST['sort'];

		// echo $id.$name;die;

		$arr = array('id'=>$id,'name'=>$name,'keywords'=>$keywords,'descript'=>$descript,'title'=>$title,'sort'=>$sort,'visibility'=>$visibility);

		$res = DB::table('category')->where('id','=',$id)->update($arr);

		if($res){
			return redirect('type/index');
		}
	}

	public function add()
	{
		// echo 11;die;
		$model = Type::ShowType();

		return view('admin::type/add',['typeList'=>$model]);
	}

	public function doAdd()
	{
		$name = $_POST['name'];
		$parent_id = $_POST['parent_id'];
		$keywords = $_POST['keywords'];
		$descript = $_POST['descript'];
		$visibility = $_POST['visibility'];
		$title = $_POST['title'];
		$sort = $_POST['sort'];

		// echo $name.$parent_id.$keywords.$descript.$visibility.$title.$sort;die;

		$res = DB::table('category')->insert(['name'=>$name,'parent_id'=>$parent_id,'keywords'=>$keywords,'descript'=>$descript,'visibility'=>$visibility,'title'=>$title,'sort'=>$sort]);

		if($res){
			return redirect('type/index');
		}
	}

}
