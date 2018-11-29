<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;

class Article extends Model
{
	//***************全局动态****************************
	use LogsActivity,Searchable;

	protected $fillable = ['title','content','id'];
	//如果需要记录所有$fillable设置的填充属性，可以使用
	protected static $logFillable = true;
	protected static $recordEvents = ['created','updated'];
	//自定义日志名称
	protected static $logName = 'article';
	//********************全局动态**********************
	//定义文章与用户的关联
	public function user(){
		//return $this->belongsTo(User::class,'user_id','id');
		return $this->belongsTo(User::class);
	}
	//定义栏目关联
	public function category(){
		return $this->belongsTo(Category::class);
	}

	//定义 zan 多态关联
	public function zan ()
	{
		//第一个参数关联模型,第二个参数跟数据迁移  zan_id  zan_type
		return $this->morphMany (Zan::class,'zan');
	}

	//定义收藏多态关联
	public function collate ()
	{
		return $this->morphMany (Collate::class,'collate');
	}

	//评论通知  通知 已读之后跳转链接
	public function getLink($param){
		return route('home.article.show',$this) . $param;
	}
}
