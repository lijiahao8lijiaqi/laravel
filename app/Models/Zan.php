<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Zan extends Model
{
	protected $fillable =['user_id'];

	//关联用户
	public function user ()
	{
		return $this->belongsTo (User::class);
	}

	//获取多态关联模型
	public function belongsModel ()
	{
		return $this->morphTo('zan');
	}


}
