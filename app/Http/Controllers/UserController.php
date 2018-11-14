<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	//登陆
	public function login ()
	{
		return view ('user.login');
	}
	//注册
	public function register ()
	{
		return view ('user.register ');
	}
	//提交注册
	public function stoer (UserRequest $request)
	{
		//dd ($request->all ());
		$data = $request->all();
		$data['password'] = bcrypt($data['password']);
		dd ($data);
		User::create($data);
		//提示并且跳转
		return redirect()->route('login')->with('success','注册成功');
	}
}
