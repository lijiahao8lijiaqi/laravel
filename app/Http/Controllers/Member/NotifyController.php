<?php

namespace App\Http\Controllers\Member;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;

class NotifyController extends Controller
{
		public function __construct () {
			$this->middleware('auth',[

				'only'=>['index']
			]);
		}

	public function index (User $user)
	{
		$this->authorize ('isMine',$user);
		$notifications = $user->notifications()->paginate(10);
		return view ('member.notify.index',compact ('user','notifications'));
	}

	public function show (DatabaseNotification $notify)
	{
		$notify->markAsRead();
		//跳转到文章详情页,页面自动滚动到对应的评论
		return redirect($notify['data']['link']);

	}
}
