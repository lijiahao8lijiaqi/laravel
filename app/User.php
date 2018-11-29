<?php

namespace App;

use App\Models\Attachment;
use App\Models\Collate;
use App\Models\Zan;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified_at','icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    //把已读的排后面
	public function notifications()
	{
		return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('read_at', 'asc')->orderBy('created_at', 'desc');
	}
    //获取所有数据的默认头像
	public function getIconAttribute( $key )
	{
		return $key?:asset('org/images/user.jpg');
	}

	//关联附件
	public function attachment ()
	{
		return $this->hasMany (Attachment::class);
	}
		//获取指定用户粉丝
	public function fans ()
	{

		return $this->belongsToMany(User::class,'followers','user_id','following_id');
	}
		//获取关注的人
	public function following ()
	{
		return $this->belongsToMany (User::class,'followers','following_id','user_id');
	}
	//获取我的收藏
	public function collate ()
	{
		return $this->hasMany (Collate::class);
	}

	//获取用户关联赞
	public function zan ()
	{
		return $this->hasMany (Zan::class);
	}
}
