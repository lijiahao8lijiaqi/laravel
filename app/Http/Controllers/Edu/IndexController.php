<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	public function index ()
	{
		return view ('edu.index.index');
	}

	public function create ()
	{
		return view ('edu.index.create');
	}

	public function store (Request $request)
	{
		dd ($request->all ());
	}
}
