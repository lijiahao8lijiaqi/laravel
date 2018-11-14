<?php

namespace App\Http\Controllers\Util;

use App\Notifications\RegisterNotify;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
	//创建发送验证码方法
	public function send (Request $request)
	{
		//dd ($request->all ());
		//dd ($request->username());
		//调用随机生成四位数验证码
		$code=$this->random ();
		//dd ($code);
		//发送验证码
		//$user=User::firstOrNew(['email=>$requst->username']);
		//dd ($request['username']);
		$user = User::firstOrNew(['email'=>$request->username]);
		//dd ($user);
		//这一步需要创;建通知类php artisan make:notification  RegisterNotify
		//$user->notyfy(new RegisterNotify($code));
		$user->notify(new RegisterNotify($code));
		//将验证码存到session中
		session ('code',$code);
		//返回结果，并输出成功语句
		return ['code'=>1,'message'=>'验证码发送成功'];
	}

	//随机生成四位验证码
	public function random ($len=4)
	{
		$str='';
		for ($i=0;$i<$len;$i++){
			$str .=mt_rand (0,9);
		}
		return $str;
	}

}
