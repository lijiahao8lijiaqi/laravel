<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
	public function __construct () {
		$this->middleware('auth',[
			'except'=>['index','show']
			]);
	}

	public function index(Request $request)
    {
		$category= $request->query('category');
		$articles = Article::latest();
		if ($category){
			$articles = $articles->where('category_id',$category);
		}
		$articles = $articles->paginate(10);
		$categories=Category::all ();

		//$articles=Article::all ();
		//dd ($articles);

		return view ('home.article.index',compact ('articles','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories=Category::all ();
        return view ('home.article.create',compact ('categories'));
    }


    public function store(ArticleRequest $request,Article $article)
    {
		//dd ($request->all ());
		$article->title = $request->title;
		$article->category_id = $request->category_id;
		$article->content = $request['content'];
		$article->user_id = auth()->id();
		$article->save();
		return redirect()->route('home.article.index')->with('success','文章发布成功');
    }


    public function show(Article $article)
    {
        return view ('home.article.show',compact ('article'));
    }


    public function edit(Article $article)
    {
		$this->authorize('update',$article);
		$categories = Category::all();
        return view ('home.article.edit',compact ('categories','article'));
    }


    public function update(Request $request, Article $article)
    {
		$this->authorize('update',$article);
		$article->title = $request->title;
		$article->category_id = $request->category_id;
		$article->content = $request['content'];
		$article->save();
		return redirect()->route('home.article.index')->with('success','文章编辑成功');
    }


    public function destroy(Article $article)
    {
		$this->authorize('delete',$article);
		$article->delete();
		return redirect()->route('home.article.index')->with('success','文章删除成功');
    }
}
