<?php
namespace App\Http\Controllers;
use App\User;
use App\Adds;
use App\Category;
use App\City;
use App\SubCategory;
use Validator;
use DB;
use Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function get_dashboard(){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				return view('admin.dashboard');
			}
			else{
				return redirect('/');
			}
		}
	}

	public function get_categories(){

		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				$categories = Category::all();
				return view('admin.cetegory',['categories'=>$categories]);
			}
			else{
				return redirect('/');
			}
		}
	}

	public function get_adds(){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				$adds = Adds::all();
				return view('admin.adds',['adds'=>$adds]);
			}
			else{
				return redirect('/');
			}
		}
	}

	public function get_cities(){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				$cities = City::all();
				return view('admin.city',['cities'=>$cities]);
			}
			else{
				return redirect('/');
			}
		}
	}
	public function get_add_city(){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				return view('admin.add_city');
			}
			else{
				return redirect('/');
			}
		}
	}



	public function get_sub_categories(){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){

				$sub_categories = DB::table('categories')->select('categories.*','sub_categories.*')
				->join('sub_categories','categories.category_id','=','sub_categories.category_id')->get();
				return view('admin.sub_category',['sub_categories'=>$sub_categories]);
			}
			else{
				return redirect('/');
			}
		}

	}

	public function add_categories(){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){

				return view('admin.add_categories');
			}
			else{
				return redirect('/');
			}
		}
	}

	public function add_sub_categories(){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){

				$categories = Category::all();
				return view('admin.add_sub_categories',['categories'=>$categories]);
			}
			else{
				return redirect('/');
			}
		}
	}

	public function add_category(Request $request){
		$data = $request->all();
		$validator = Validator::make(
			array(
				'category_name' =>$request->category_name,
				'category_icon' =>$request->file('category_icon'),
				),
			array(
				'category_name' =>'required|unique:categories,category_name',
				'category_icon' => 'required|mimes:jpeg,png',
				)
			);

		if($validator->fails())
		{
			return redirect('/admin/add_category')
			->withErrors($validator)
			->withInput();
		}

		else
		{
			$category = new Category();
			$category->category_name=$request->category_name;

			$file = $request->file('category_icon');
			$extension = $file->getClientOriginalExtension();
			$path = 'images/category/'.date('U').'.'.$extension;
			$category->category_icon= $path;
			$category->is_active= 0;
			$request->file('category_icon')->move(base_path().'/public/images/category/', $path);

			if($category->save()){
				return redirect('/admin/add_category')->with('success','Added Successfully!');
			}

		}
	}
	public function enable_category($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){

				$category = Category::find($id);
				$category->is_active = 1;
				if($category->save()){
					return redirect('/admin/get_categories')->with('success','Category Enabled Successfully!');
				}
			}
			else{
				return redirect('/');
			}
		}
	}
	public function disable_category($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){

				$category = Category::find($id);
				$category->is_active = 0;
				if($category->save()){
					return redirect('/admin/get_categories')->with('success','Category Disabled Successfully!');
				}
			}
			else{
				return redirect('/');
			}
		}
	}

	public function get_edit_category($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){

				$category = Category::find($id);
				return view('admin.edit_category',['category'=>$category]);
			}
			else{
				return redirect('/');
			}
		}

	}
	public function get_edit_sub_category($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				$category = Category::all();
				$sub_category = SubCategory::find($id);
				$pageData['category'] = $category;
				$pageData['sub_category'] = $sub_category;
				return view('admin.edit_sub_category',$pageData);
			}
			else{
				return redirect('/');
			}
		}

	}
	public function edit_category(Request $request){
		$data = $request->all();
		$validator = Validator::make(
			array(
				'category_name' =>$request->category_name,
				'category_icon' =>$request->file('category_icon'),
				),
			array(
				'category_name' =>'required',
				'category_icon' => 'required|mimes:jpeg,png',
				)
			);

		if($validator->fails())
		{

			return redirect('/admin/get_edit_category/'.$request->category_id)
			->withErrors($validator)
			->withInput();
		}

		else
		{
			$category = Category::find($request->category_id);
			$category->category_name=$request->category_name;

			$file = $request->file('category_icon');
			$extension = $file->getClientOriginalExtension();
			$path = 'public/images/category/'.date('U').'.'.$extension;
			$category->category_icon= $path;
			$request->file('category_icon')->move(base_path().'/public/images/category/', $path);

			if($category->save()){
				return redirect('/admin/get_categories')->with('success','Updated Successfully!');
			}

		}
	}

	public function edit_sub_category(Request $request){
		$data = $request->all();
		$validator = Validator::make(
			array(
				'category' =>$request->category,
				'sub_category_name' =>$request->sub_category_name,
				),
			array(
				'category' =>'required',
				'sub_category_name' => 'required',
				)
			);

		if($validator->fails())
		{
			return redirect('/admin/get_edit_sub_category/'.$request->sub_category_id)
			->withErrors($validator)
			->withInput();
		}

		else
		{
			$sub_category = SubCategory::find($request->sub_category_id);
			$sub_category->category_id=$request->category;
			$sub_category->name= $request->sub_category_name;
			if($sub_category->save()){
				return redirect('/admin/get_sub_categories')->with('success','Edited Successfully!');
			}

		}
	}
	public function delete_category($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){

				$category = Category::find($id);
				if($category->delete()){
					return redirect('/admin/get_categories')->with('success','Category Deleted Successfully!');
				}
			}
			else{
				return redirect('/');
			}
		}

	}

	public function add_sub_category(Request $request){
		$data = $request->all();
		$validator = Validator::make(
			array(
				'category' =>$request->category,
				'sub_category_name' =>$request->sub_category_name,
				),
			array(
				'category' =>'required',
				'sub_category_name' => 'required',
				)
			);

		if($validator->fails())
		{
			return redirect('/admin/add_sub_category')
			->withErrors($validator)
			->withInput();
		}

		else
		{
			$sub_category = new SubCategory();
			$sub_category->category_id=$request->category;
			$sub_category->name= $request->sub_category_name;

			if($sub_category->save()){
				return redirect('/admin/add_sub_category')->with('success','Added Successfully!');
			}

		}
	}

	public function delete_sub_category($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				$sub_category = SubCategory::find($id);
				if($sub_category->delete()){
					return redirect('/admin/get_sub_categories')->with('success','Sub Category Deleted Successfully!');
				}
			}
			else{
				return redirect('/');
			}
		}

	}

	public function add_city(Request $request){
		$data = $request->all();
		$validator = Validator::make(
			array(
				'city_name' =>$request->city_name,
				),
			array(
				'city_name' =>'required',
				)
			);

		if($validator->fails())
		{
			return redirect('/admin/add_city')
			->withErrors($validator)
			->withInput();
		}

		else
		{
			$city = new City();
			$city->city_name=$request->city_name;
			$city->is_active= 0;
			if($city->save()){
				return redirect('/admin/add_city')->with('success','Added Successfully!');
			}

		}
	}
	public function enable_city($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				$city = City::find($id);
				$city->is_active = 1;
				if($city->save()){
					return redirect('/admin/cities')->with('success','City Enabled Successfully!');
				}
			}
			else{
				return redirect('/');
			}
		}
	}

	public function disable_city($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				$city = City::find($id);
				$city->is_active = 0;
				if($city->save()){
					return redirect('/admin/cities')->with('success','City Disabled Successfully!');
				}
			}
			else{
				return redirect('/');
			}
		}
	}

	public function delete_city($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				$city = City::find($id);
				if($city->delete()){
					return redirect('/admin/cities')->with('success','City Deleted Successfully!');
				}
			}
			else{
				return redirect('/');
			}
		}
	}

	public function delete_add($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				$add = Adds::find($id);
				if($add->delete()){
					return redirect('/admin/get_adds')->with('success','Add Deleted Successfully!');
				}
			}
			else{
				return redirect('/');
			}
		}

	}

	public function enable_add($adds_id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){

				$add = Adds::find($adds_id);
				$add->is_approved = 1;
				if($add->save()){
					return redirect('/admin/get_adds')->with('success','Add Enabled Successfully!');
				}
			}
			else{
				return redirect('/');
			}
		}
	}
	public function disable_add($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				$add = Adds::find($id);
				$add->is_approved = 0;
				if($add->save()){
					return redirect('/admin/get_adds')->with('success','Add Enabled Successfully!');
				}
			}
			else{
				return redirect('/');
			}
		}
	}




	public function get_edit_city($id){
		if(Auth::check()){
			if(Auth::user()->user_type == 0){
				$cities = City::find($id);
				return view('admin.edit_location',['city'=>$cities]);
			}
			else{
				return redirect('/');
			}
		}

	}

	public function edit_city(Request $request){
		$data = $request->all();
		$validator = Validator::make(
			array(
				'city_name' =>$request->city_name,
				),
			array(
				'city_name' =>'required',
				)
			);

		if($validator->fails())
		{

			return redirect('/admin/get_edit_city/'.$request->city_id)
			->withErrors($validator)
			->withInput();
		}

		else
		{
			$city = City::find($request->city_id);
			$city->city_name=$request->city_name;

			if($city->save()){
				return redirect('/admin/cities')->with('success','Updated Successfully!');
			}

		}
	}



}