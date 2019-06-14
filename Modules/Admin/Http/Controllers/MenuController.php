<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Admin\Models\Menu;
use DB;

class MenuController extends Controller
{
	
    public function index()
    {
    	$data = DB::table('menu')->get();
    	return view('admin::menu/index',['data' => $data]);
    }

    public function upMenu()
    {
        $id = request()->get('id');

    }
}
