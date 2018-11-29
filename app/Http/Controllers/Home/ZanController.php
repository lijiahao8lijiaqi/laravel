<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class ZanController extends Controller
{
		public function __construct () {
			$this->middleware('auth',[
				'only'=>['make']
			]);
		}

	public function make (Request $request)
	{
		//接受type/id
		$type= $request->query('type');
		$id = $request->query('id');
		//dd ($request->all ());
		//根据GET 参数 type 获取CLASS名
		$class = 'App\Models\\' . ucfirst ($type);
		//dd ($class);
		//获取文章id
		//$model=Article::find($id);
		//获取评论id
		//$model = Comment::find($id);
		//获取文章评论模型
		$model = $class ::find($id);
		//dd ($model);
		//dd ($model->zan->where('user_id',auth()->id())->first());

		if($zan = $model->zan->where('user_id',auth()->id())->first()){
			//执行删除
			$zan->delete();
		}else{
			//执行添加
			$model->zan()->create(['user_id'=>auth()->id()]);
		}
		//判断是否为异步请求
		if ($request->ajax ()){
			//重新获取对应模型
			$newmodel= $class ::find($id);
			//dd ($newmodel);
			return ['code'=>1,'message'=>'','num'=>$newmodel->zan->count()];
		}
		return back ();
	}
}
