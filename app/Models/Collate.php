<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Collate extends Model
{
    protected $fillable = ['user_id'];

	//关联用户
	public function user ()
	{
		return $this->belongsTo (User::class);
	}

	public function belongsModel ()
	{
		return $this->morphTo('collate');
	}

}
