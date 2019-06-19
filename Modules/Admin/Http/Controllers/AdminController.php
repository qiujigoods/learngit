<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use App\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::login/login');
    }

    public function login()
    {
        if(request()->isMethod('post')){

            $data = request()->post();

            $res  = DB::table("admin")->where('email', $data['email'])->where('password', md5($data['password']))->where('is_del', '0')->first();

            if($res){
                session(['info' => $res]);
                return redirect('admin/home');
            }else{
                echo "账号或密码错误";die;
            }
        }
        
    }

    public function out()
    {
        session()->forget('admin_name');
        return redirect('admin');
    }

    public function home()
    { 
        //判断session中是否存在用户信息
        // if (request()->Session()->has('info')) {
        //     // 获取用户信息
        //     $info = request()->Session()->get('info');

        //     $admin_role = DB::table('admin_role')->where('admin_id', $id)->get();

        //     $object = $admin_role->first();
            
        //     $role_menu = DB::table('role_menu')->where('role_id', $object->role_id)->get();

        //     $relations = [];

        //     foreach ($role_menu as $k => $v) {
        //         $relations[] = $v->menu_id;
        //     }

        //     $menu = DB::table('menu')->whereIn('id', $relations)->get();
        // }

        $res = DB::table('menu')
                            ->where('parent_id','=',0)
                            ->get();

        $data =  DB::table('menu')->get();        
      
        return view('admin::login/index',['res'=>$res,'data'=>$data]);
    }

    public function welcome()
    {
        return view('admin::login/welcome');
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
