<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
		$articles = Article::latest()->where('user_id',$user->id)->paginate(10);
        return view ('member.user.show',compact ('user','articles'));
    }


    public function edit(User $user,Request $request )
    {

		//调用策略
		$this->authorize('isMine',$user);
		//接受type参数，
		$type = $request->query('type');

		return view('member.user.edit_'.$type,compact('user'));

    }


    public function update(Request $request, User $user)
    {
		$data = $request->all();
		//调用策略
		$this->authorize('isMine',$user);
		$this->validate($request,[
			'password' =>'sometimes|required|min:3|confirmed',
			'name'=>'sometimes|required',
		],[
			'password.required'=>'请输入密码',
			'password.min'=>'密码不能少于3位',
			'password.confirmed'=>'密码不一致',
			'name.required'=>'请输入昵称'
		]);
		//密码加密
		if($request->password){
			$data['password'] = bcrypt($data['password']);
		}
		//执行更新
		//dd ($data);
		$user->update($data);
		return back()->with('success','操作成功');
    }

	//关注跟取消关注
	public function attention (User $user)
	{
		//dd ($user->toArray ());
		$user->fans()->toggle(auth()->user());
		return back();
	}
}
