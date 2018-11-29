<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollateController extends Controller
{
	public function __construct () {
		$this->middleware('auth',[

			'only'=>['enshrine']
		]);
	}

	//收藏
	public function enshrine (Request $request)
	{
		$type = $request->query('type');
		//dd ($type);
		$id = $request->query('id');
		$class = 'App\Models\\' . ucfirst ($type);
		//dd ($class);
		$model = $class::find($id);
		//dd ($model);
		if($zan = $model->collate->where('user_id',auth()->id())->first()){
			//执行删除
			$zan->delete();
		}else{
			//执行添加
			$model->collate()->create(['user_id'=>auth()->id()]);
		}

		return back ();
	}
}
