<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Repositories\Eloquent\AdminRepositoryEloquent;

class AdminController extends BaseController
{
    protected $admin;
    public function __construct(AdminRepositoryEloquent $admin){
      $this->admin = $admin;
    }
	   //管理员列表

    public function index(){
    	$admins = $this->admin->getlist(10);
    	return view('admin.admin.index',compact('admins'));
    }


    //管理员创建页面
    public function create(){
  		return view('admin.admin.add');
  	}

  	//
  	public function store(){
  		$this->validate(request(),[
  			'account'    => 'required|min:5',
        'realname'   => 'string|min:3',
        'mobile'     => 'numeric|size:11',
        'email'      => 'email',
  			'password'   => 'required',
  		]);

  		$account = request('account');
  		$password = bcrypt(request('password'));
  		Admin::create(compact('account','password'));

  		return redirect('admin/admins');
  	}

  	public function ajaxDestroy(){

      $isDel = $this->admin->destroy(request('id'));
      if ($isDel){
        $results['state'] = 1;
        $results['msg'] = trans('admin/system.success');
      }else{
        $results['state'] = 2;
        $results['msg'] = trans('admin/system.error');
      }

      return $results;
  	}
}
