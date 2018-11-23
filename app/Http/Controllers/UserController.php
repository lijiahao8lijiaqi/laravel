<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct () {
		//调用中间件,登陆用户不允许进以下页面
		$this->middleware('guest',[
			'only'=>['login','loginForm','register','store','passwordReset','passwordResetForm'],
		]);
	}

	//登陆
	public function login ()
	{
		return view ('user.login');
	}
	//提交登陆
	public function loginForm (Request $request)
	{
		//验证登陆
		$this->validate ($request,[
			'email'=>'email',
			'password'=>'required|min:3'
			],[
				'email.email'=>'请输入邮箱',
				'password.request'=>'请输入密码',
				'password.min'=>'密码不能少于三位',

		]);
		//执行登陆
		$attestation=$request->only ('email','password');
		if (\Auth::attempt ($attestation,$request->remember)){
			//登陆成功,跳转首页并提示成功语句
			if ($request->from){
				return redirect ($request->from)->with ('success','登陆成功');
			}else{
				return redirect ()->route ('home')->with ('success','登陆成功');
			}

		}
		return redirect ()->back ()->with ('danger','用户名密码不存在');
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
		//dd ($data);
		User::create($data);
		//提示并且跳转到登陆页面
		return redirect()->route('login')->with('success','注册成功');
	}
	//退出登陆
	public function logoff ()
	{
		//退出登录并跳转到主页面
		\Auth::logout();
		return redirect ()->route ('home');
	}
		//重置密码
	public function passwordReset ()
	{
		return view ('user.passwordReset');
	}
	//提交重置密码
	public function passwordResetForm (RegisterRequest $request)
	{
		//拿用户提交的邮箱来对比数据库里面的邮箱
		$user= User:: where('email',$request->email)->first();
		if($user){
			//修改密码
			$user->password = bcrypt($request->password);
			$user->save();
			return redirect()->route('login')->with('success','密码重置成功');
		}
		return redirect()->back()->with('danger','该邮箱未注册');
	}
}
