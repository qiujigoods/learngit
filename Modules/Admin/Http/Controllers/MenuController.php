<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Admin\Models\Menu\Menu;
use Modules\Admin\Http\Requests\MenuAction;
use DB;

class MenuController extends Controller
{
	
    public function index()
    {
        $model = Menu::ShowType();
    	return view('admin::menu/index',['data' => $model]);
    }

    public function upMenu()
    {
        $id = request()->get('id');
        $data = Menu::where('id', '=', $id)->get();
        $data = json_encode($data);
        $data = json_decode($data);
        return view('admin::menu/upMenu', ['data' => $data[0]]);
    }

    public function upMenuDo(MenuAction $request)
    {
//        echo '123';
        $id = request()->post('id');
        $validated = $request->validated();
//        echo $id;
//        var_dump($validated);die;
        $menu = new Menu();
//        $menu->where('id', '=', $id);
//        $menu->date(array('name' => $validated['name']));
//        $menu->save();
        $validated['save_time'] = time();
//        var_dump($validated);die;
        $res = $menu->where('id', $id)->update($validated);
        if ($res){
            echo '修改成功';
        }else{
            echo '修改失败';
        }


    }

    public function delOne(Request $request)
    {
        $id = request()->post('id');
        $this->validate($request, [
            'id' => 'required',
        ]);
        $menu = new Menu();
        $res = $menu -> del($id);
        if ($res){
            echo '删除成功';
        }else{
            echo '删除失败';
        }

    }

    public function add()
    {
        $data = Menu::ShowType();
        echo '<pre/>';
//        var_dump($data);die;
        return view('admin::menu/add', ['data' => $data]);
    }

    public function doAdd()
    {
        $data = request()->post();
        $arr = [
            'name'=>$data['name'],
            'url'=>$data['url'],
            'static'=>$data['static'],
            'create_time'=>date('Y-m-d H:', time()),
            'save_time'=>time(),
            'parent_id'=>$data['parent_id'],
        ];
        $res = DB::table('menu')->insert($arr);
        if ($res){
            echo '添加成功';
        }else{
            echo '添加失败';
        }
    }

}
