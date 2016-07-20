<?php
namespace App\Http\Controllers;
use App\User;
use App\Adds;
use App\Category;
use App\Locations;
use App\SubCategory;
use Validator;
use DB;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
	public function get_dashboard(){
		return view('admin.dashboard');
	}

	public function get_categories(){
		$categories = Category::all();
		return view('admin.cetegory',['categories'=>$categories]);
	}

	public function get_adds(){
		$adds = Adds::all();
		return view('admin.adds',['adds'=>$adds]);
	}

	public function get_locations(){
		$locations = Locations::all();
		return view('admin.location',['locations'=>$locations]);
	}
	public function get_add_location(){
		return view('admin.add_location');
	}



	public function get_sub_categories(){
		
		$sub_categories = DB::table('categories')->select('categories.*','sub_categories.*')
		->join('sub_categories','categories.category_id','=','sub_categories.category_id')->get();
		return view('admin.sub_category',['sub_categories'=>$sub_categories]);
	}

	public function add_categories(){
		return view('admin.add_categories');
	}

	public function add_sub_categories(){
		$categories = Category::all();
		return view('admin.add_sub_categories',['categories'=>$categories]);
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
		$category = Category::find($id);
		$category->is_active = 1;
		if($category->save()){
			return redirect('/admin/get_categories')->with('success','Category Enabled Successfully!');
		}
	}
	public function disable_category($id){
		$category = Category::find($id);
		$category->is_active = 0;
		if($category->save()){
			return redirect('/admin/get_categories')->with('success','Category Disabled Successfully!');
		}
	}

	public function get_edit_category($id){
		$category = Category::find($id);
		return view('admin.edit_category',['category'=>$category]);
		
	}
	public function get_edit_sub_category($id){
		$category = Category::all();
		$sub_category = SubCategory::find($id);
		$pageData['category'] = $category;
		$pageData['sub_category'] = $sub_category;
		return view('admin.edit_sub_category',$pageData);
		
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
		$category = Category::find($id);
		if($category->delete()){
			return redirect('/admin/get_categories')->with('success','Category Deleted Successfully!');
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
		$sub_category = SubCategory::find($id);
		if($sub_category->delete()){
			return redirect('/admin/get_sub_categories')->with('success','Sub Category Deleted Successfully!');
		}
		
	}
	
	public function add_location(Request $request){
		$data = $request->all();
		$validator = Validator::make(
			array(
				'location_name' =>$request->location_name,
				),
			array(
				'location_name' =>'required',
				)
			);

		if($validator->fails())
		{
			return redirect('/admin/add_location')
			->withErrors($validator)
			->withInput();
		}

		else
		{
			$location = new Locations();
			$location->location_name=$request->location_name;
			$location->is_active= 0;
			if($location->save()){
				return redirect('/admin/add_location')->with('success','Added Successfully!');
			}

		}
	}
	public function enable_location($id){
		$location = Locations::find($id);
		$location->is_active = 1;
		if($location->save()){
			return redirect('/admin/locations')->with('success','Locations Enabled Successfully!');
		}
	}

	public function disable_location($id){
		$location = Locations::find($id);
		$location->is_active = 0;
		if($location->save()){
			return redirect('/admin/locations')->with('success','Location Disabled Successfully!');
		}
	}

	public function delete_location($id){
		$location = Locations::find($id);
		if($location->delete()){
			return redirect('/admin/locations')->with('success','Location Deleted Successfully!');
		}
		
	}

	public function delete_add($id){
		$add = Adds::find($id);
		if($add->delete()){
			return redirect('/admin/get_adds')->with('success','Add Deleted Successfully!');
		}
		
	}

	public function enable_add($adds_id){
		
		$add = Adds::find($adds_id);
		$add->is_approved = 1;
		if($add->save()){
			return redirect('/admin/get_adds')->with('success','Add Enabled Successfully!');
		}
	}
	public function disable_add($id){
		$add = Adds::find($id);
		$add->is_approved = 0;
		if($add->save()){
			return redirect('/admin/get_adds')->with('success','Add Enabled Successfully!');
		}
	}

	


	public function get_edit_location($id){
		$locations = Locations::find($id);
		return view('admin.edit_location',['location'=>$locations]);
		
	}

	public function edit_location(Request $request){
		$data = $request->all();
		$validator = Validator::make(
			array(
				'location_name' =>$request->location_name,
				),
			array(
				'location_name' =>'required',
				)
			);

		if($validator->fails())
		{
			
			return redirect('/admin/get_edit_location/'.$request->location_id)
			->withErrors($validator)
			->withInput();
		}

		else
		{
			$location = Locations::find($request->location_id);
			$location->location_name=$request->location_name;
			
			if($location->save()){
				return redirect('/admin/locations')->with('success','Updated Successfully!');
			}

		}
	}

	
	
}