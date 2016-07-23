<?php
namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\SubCategory;
use App\City;
use App\Adds;
use App\Image;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;

use Auth;
use DB;
use Session;
use Validator;
use Hash;

use Billable;

use Stripe;

class WebfrontController extends Controller
{
	public $user;

	public function __construct()
	{
		$this->user = Auth::user();
	}

	public function gethome(){

		$categories = Category::where('is_active','=','1')->get();
		$cities = City::where('is_active','=','1')->get();
		$pageData['categories'] = $categories;
		$pageData['cities'] = $cities;
		return view('webfront.home',$pageData);

	}

	public function search_result(Request $request)
	{

		$city =  $request->city ;
		$adds_title =  $request->ads ;

		$search_result = Adds::where('adds_title', 'LIKE', '%'.$adds_title.'%')
		->orwhere('city', 'LIKE', '%'.$city.'%')
		->where('is_approved', '=', '1')->paginate(15);

		$all_category = Category::where('is_active','=','1')->get();
		$all_cities = City::where('is_active','=','1')->get();

		$pageData['all_category'] = $all_category;
		$pageData['all_cities'] = $all_cities;
		$pageData['search_results'] = $search_result;

		return view('webfront.search',$pageData);

	}

	public function get_login(){

		return view('webfront.login');
		
	}
	public function login(Request $request){

		$validator = Validator::make(
			array(
				'email' =>$request->email,
				'password' =>$request->password
				),
			array(
				'email' =>'required|email',
				'password' =>'required|alpha_num|min:5'
				)
			);
		if($validator->fails())
		{
			return redirect('/login')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$email=$request->email;
			$password=$request->password;

			$is_email_verify = User::is_email_verify($email);

			if($is_email_verify == "0"){
				return redirect('/login')->with('login_error',"You need to confirm your account. We have sent you an activation code, please check your email.");
			}

			else{
				$user = array('email' =>$email,'password' =>$password);
				if(Auth::attempt($user)){
					
					if(Auth::user()->user_type=='2'){
						Session::put('name',Auth::user()->first_name." ". Auth::user()->last_name);;
						Session::put('email',Auth::user()->email);;
						return redirect('/');
					}elseif(Auth::user()->user_type=='0'){
						return redirect('admin/dashboard');
					}
					else{
						return redirect('/login')->with('login_error',"Invalid email or password");

					}
				}
				else{
					return redirect('/login')->with('login_error',"Invalid email or password");
				}
			}
		}

	}

	public function get_logout(){
		Auth::logout();
		Session::flush();
		return redirect('/');

	}
	public function get_forgot_password(){

		return view('webfront.forgot-password');

	}

	public function get_signup(){

		return view('webfront.signup');
	}

	public function signup(Request $request){
		$data = $request->all();

		$validator = Validator::make($data,
			array(

				'fname' =>'required',
				'lname' =>'required',
				'phone' =>'required|min:10|max:10',
				'email' =>'required|email|unique:users,email',
				'password' =>'required|min:5',
				'Terms' =>'accepted',

				)
			);

		if($validator->fails())
		{
			return redirect('/signup')
			->withErrors($validator)
			->withInput();
		}

		else
		{

			$user = new User();
			$user->first_name=$request->fname;
			$user->last_name=$request->lname;
			$user->email=$request->email;
			$user->password=Hash::make($request->password);
			$user->gender=$request->gender;
			$user->mobile_no=$request->phone;
			$user->about_me=$request->about;
			$user->account_type=$request->account_type;
			$user->user_type=2;
			$user->remember_token=$request->_token;
			if($user->save()){
				return redirect('/signup')
				->with('success','Registered Successfully! Now Login');
			}

		}

	}

	public function get_adds_form(){
		// if(Auth::check()){
		$categories = Category::where('is_active','=','1')->get();
		$cities = City::where('is_active','=','1')->get();
		$pageData['categories'] = $categories;
		$pageData['cities'] = $cities;
		return view('webfront.adds-form',$pageData);
		// }
		// else{
		// 	return redirect('login');
		// }

	}
	public function save_add(Request $request){

		$data = $request->all();
		$validator = Validator::make($data,
			array(

				'category_id' =>'required',
				'adds_title' =>'required',
				'adds_description' =>'required',
				'price' =>'required',
				'seller_name' =>'required',
				'seller_email' =>'required|email',
				'seller_phone' =>'required|min:10|max:10',
				'location' =>'required',
				'city' =>'required',
				'Terms' =>'accepted',
				)
			);

		if($validator->fails())
		{
			return redirect('/post-free-add')
			->withErrors($validator)
			->withInput();
		}

		else
		{

			$adds = new Adds();
			$adds->category_id=$request->category_id;
			$adds->adds_type=$request->adds_type;
			$adds->adds_title=$request->adds_title;
			$adds->slug=str_replace(" ","-",$request->adds_title).rand(0,1000);
			$adds->adds_description=$request->adds_description;
			$adds->adds_description=$request->adds_description;
			$adds->price=$request->price;
			$adds->seller_name=$request->seller_name;
			$adds->seller_email=$request->seller_email;
			$adds->seller_phone=$request->seller_phone;

			if(Auth::check()){
				$adds->user_id=$this->user->id;
			}

			$adds->location=$request->location;
			$adds->city=$request->city;
			$adds->save();

			$files =array();
			if ($request->file('file1')){ $files[] = $request->file('file1'); }
			if ($request->file('file2')) { $files[] = $request->file('file2'); }
			if ($request->file('file3')) { $files[] = $request->file('file3'); }
			if ($request->file('file4')) { $files[] = $request->file('file4'); }
			if ($request->file('file5')) { $files[] = $request->file('file5'); }
			if(count($files)>0){
				foreach ($files as $file)
				{
					$img = new Image();
					$filename = str_replace(' ', '', $file->getClientOriginalName());
					$extension = $file->getClientOriginalExtension();
					$path = 'images/adds/'.$filename.date('U').'.'.$extension;
					$file->move(base_path().'/public/images/adds', $path);
					$img->adds_id = $adds->adds_id;
					$img->img_path = $path;
					$img->save();

				}
			}

			return redirect('/post-free-add')
			->with('success','Your Post Added Successfully!');

		}

	}

	public function get_category($category){
		$all_category = Category::where('is_active','=','1')->get();
		$all_cities = City::where('is_active','=','1')->get();
		$categories = Category::where('category_name','=',$category)->first();
		$sub_categories = SubCategory::where('category_id','=',$categories->category_id)->get();


		$adds = DB::table('adds_info')->where('adds_info.is_approved', '=', 1)
		->join('categories', 'adds_info.category_id', '=', 'categories.category_id')
		->leftJoin('cities', 'adds_info.city', '=', 'cities.id')
		->where('categories.category_id', '=', $categories->category_id)

		->paginate(15);
		$pageData['all_category'] = $all_category; 
		$pageData['all_cities'] = $all_cities; 
		$pageData['categories'] = $categories; 
		$pageData['sub_categories'] = $sub_categories; 
		$pageData['adds'] = $adds; 
		return view('webfront.category',$pageData);		
	}

	public function get_single_adds($slug){

		$id = DB::table('adds_info')->where('adds_info.slug', '=', $slug)->first();
		$adds = DB::table('adds_info')->where('adds_info.adds_id', '=', $id->adds_id)
		->join('categories', 'adds_info.category_id', '=', 'categories.category_id')
		->leftJoin('cities', 'adds_info.city', '=', 'cities.id')
		->first();

		$images = DB::table('images')->where('images.adds_id', '=', $id->adds_id)->get();

		$pageData['adds'] = $adds;
		$pageData['images'] = $images;
		return view('webfront.single-add',$pageData);
	}

	public function get_about_us(){

		return view('webfront.about-us');
	}

	public function get_terms_and_conditions(){

		return view('webfront.terms-and-conditions');
	}

	public function get_privacy_policy(){

		return view('webfront.privacy-policy');
	}

	public function get_contact_us(){

		return view('webfront.contact-us');
	}

	public function get_faq(){

		return view('webfront.faq');
	}


}


