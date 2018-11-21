<?php

namespace App\Models;

use App\Policies\ArticlePolicy;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
		'title','icon'
	];

	public function article ()
	{
		return $this->hasMany (Article::class);
	}
}
