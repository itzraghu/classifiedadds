<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

class TestController extends Controller
{
	public function add_category(Request $request){
		$data = $request->all();
		// dd($data);
		$validator = Validator::make($data,
			array(
				'category_name' =>'required',
				'category_icon' =>'required',
				)
			);

		if($validator->fails())
		{
			// dd($validator);
			return redirect('/admin/category')
			->withErrors($validator)
			->withInput();
		}

		else
		{
			$category = new Category();
			$category->category_name=$request->category_name;
			$category->category_icon= '/public/images/category/'.str_replace(' ', '', $file->getClientOriginalName());
			$file->move(base_path().'/public/images/category/', str_replace(' ', '', $file->getClientOriginalName()));

			if($category->save()){
				return redirect('/admin/category')
				->with('success','Added Successfully!');
			}

		}
	}
}
