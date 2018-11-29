<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
	public function index ()
	{
		//获取所有数据
		$actives = Activity::latest()->paginate(10);
		return view ('home.index',compact ('actives'));
	}

	public function search (Request $request)
	{


		//接受搜索的关键词
		$wd =$request->query('wd');

		//判断是否输入了内容
		if (!$wd){
			return redirect ()->back ()->with ('danger','请输入您要搜索的内容');
		}

		//获取所有数据
		$articles = Article::search($wd)->paginate(10);
		//dd ($articles);

		return view ('home.search',compact ('articles'));
	}
}
