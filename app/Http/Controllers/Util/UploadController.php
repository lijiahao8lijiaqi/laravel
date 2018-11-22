<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
	//处理上传图片
	public function uploader (Request $request)
	{
		//dd (1);
		$file=$request->file ('file');
		//图片的大小拦截
		$this->checkSize($file);
		//类型拦截
		$this->checkType($file);
		//dd ($file);
		//dd ($_FILES);
		//$path = $request->file('avatar')->store('avatars');
		//$path = $request->file('file')->store('avatars');
		//dd ($path);
		if ($file){
			$path= $file->store('attachment','attachment');
			auth ()->user ()->attachment()->create([
				'name'=>$file->getClientOriginalName (),
				'path'=>url ($path)
			]);
		}
		return ['file' =>url($path), 'code' => 0];
	}

	public function checkSize ($file)
	{
		if ($file->getSize()>20000000){
			throw new UploadException('上传文件过大');
		}
	}

	public function checkType ($file)
	{
		if(!in_array(strtolower($file->getClientOriginalExtension()),['jpg','png'])){
			throw new UploadException ('类型不允许');
		}
	}
	//获取图片列表
	public function filesLists ()
	{
		$files = auth()->user()->attachment()->paginate(10);

		$data = [];
		foreach($files as $file){
			$data[] = [
				'url'=>$file['path'],
				'path'=>$file['path']
			];
		}


		return [
			'data'=>$data,
			//这里一定要注意分页后面拼接一个空字符串不加空字符串答应出来什么都没有
			'page'=>$files->links() . '',
			'code'=> 0
		];
	}
}
