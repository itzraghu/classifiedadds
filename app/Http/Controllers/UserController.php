<?php
namespace App\Http\Controllers;
use App\User;
use App\Adds;
use Auth;
use Session;
use Validator;
use DB;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
class UserController extends Controller
{
	public $user;

	public function __construct()
	{
		$this->user = Auth::user();
	}
	public function get_my_account(){
		if(Auth::check()){
			$user = User::find($this->user->id);
			return view('user.myaccount',['user'=>$user]);
		}
		else{
			return redirect('/');
		}
	}
	public function get_my_adds(){
		if(Auth::check() && $this->user->user_type=="2"){
			$adds = Adds::where('user_id','=',Auth::user()->id)->get();
			return view('user.my-adds',['adds'=>$adds]);
		}
		else{
			return redirect('/');
		}
	}
	public function get_statements(){
		return view('user.statements');
	}
	public function change_password(Request $request){
		$validator = Validator::make(
			array(
				'new_password' =>$request->new_password,
				'confirm_password' =>$request->confirm_password
				),
			array(
				'new_password' =>'required|min:5',
				'confirm_password' =>'required|min:5|same:new_password'
				)
			);
		if($validator->fails())
		{
			return redirect('MyAccount')
			->withErrors($validator)
			->withInput();
		}
		else
		{

			$user = User::find($this->user->id);
			$user->password = Hash::make($request->new_password);
			if($user->save()){
				return redirect('MyAccount')->with('success',"Password Changed Successfully");

			}else{

				return redirect('MyAccount')->with('error',"Oops ! Something went go wrong");
			}


		}
	}
	public function update_profile(Request $request){

		$data = $request->all();
		//dd($data);
		$validator = Validator::make($data,
			array(
				'first_name' =>'required',
				'last_name' =>'required',
				'seller_phone' =>'required|min:10|max:10',
				)
			);
		if($validator->fails())
		{
			return redirect('MyAccount')
			->withErrors($validator)
			->withInput();
		}
		else
		{

			$user = User::find($this->user->id);
			$user->first_name=$request->first_name;
			$user->last_name=$request->last_name;
			$user->mobile_no=$request->seller_phone;
			$user->address=$request->address;
			$user->zip_code=$request->zip_code;
			if($user->save()){
				return redirect('MyAccount')->with('success',"Profile Edited Successfully");

			}else{

				return redirect('MyAccount')->with('error',"Oops ! Something went go wrong");
			}


		}
	}
}