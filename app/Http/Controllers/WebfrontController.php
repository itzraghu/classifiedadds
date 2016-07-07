<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;

use Auth;
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


		return view('webfront.home');

	}

	public function get_login(){

		return view('webfront.login');
	}
	public function login(Request $request){
		//dd($request->all());
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

				$login_result = User::where('email',$email)->first();
				if(count($login_result)>0){
					$user_type = $login_result->type;
					if($user_type=='Artist'){
						$user = array('email' =>$email,'password' =>$password);
						Auth::attempt($user);
						return redirect('Dashboard');
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

		return view('webfront.adds-form');

	}
	public function save_add(Request $request){

		dd($request->all());

	}

	public function get_category(){

		return view('webfront.category');		
	}

	public function get_single_adds(){

		return view('webfront.single-add');
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


