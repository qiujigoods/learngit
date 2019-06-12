<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller
{
	public function add()
	{
		return view('admin::role/add');
	}
}