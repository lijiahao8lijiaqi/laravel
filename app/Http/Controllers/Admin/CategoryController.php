<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequests;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categories = Category::paginate(10);
        return view ('admin.category.index',compact ('categories'));
    }


    public function create()
    {
        return view ('admin.category.cerate');
    }


    public function store(CategoryRequests $request)
    {
		Category::create($request->all());
		return redirect()->route('admin.category.index')->with('success','提交成功');
    }

    public function edit(Category $category)
    {
        return view ('admin.category.edit',compact ('category'));
    }

    public function update(Request $request, Category $category)
    {
		$category->update($request->all());
		return redirect()->route('admin.category.index')->with('success','修改成功');
    }


    public function destroy(Category $category)
    {
		$category->delete();
		return redirect()->route('admin.category.index')->with('success','删除成功');
    }
}
