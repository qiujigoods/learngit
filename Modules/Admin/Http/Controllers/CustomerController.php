<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
	public function pass()
	{
		return view('admin::customer/customer-list');
	}	
}