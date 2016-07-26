<?php
namespace App\Http\Controllers;
use App\User;
use App\Profile;
use App\Requestvideo;
use App\Video;
use App\OriginalVideo;
use App\Notification;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use App\Http\Requests;
use Hash;
use Validator;
use Mail;
use Auth;
use Carbon\Carbon;
use FFMpeg;
use Session;
class LoginController extends Controller{
	public function logins() {
		return view('frontend.login');
	}
	public function registers() {
		return view('frontend.register');
	}
	/*------------------------------Add Price-------------------------------*/
	public function add_price() {
		if(Auth::check()){
			if(Auth::user()->type=="Admin"){
				return redirect('admin_dashboard');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				$artist =  Profile::where('EmailId',Auth::user()->email)->first();
				$artist_data['artist'] = $artist;
				$artist_data['baseurl'] = "http://videorequestlive.com/";
				return view('frontend.artistDashboard.video_price',$artist_data);
			}
		}
		else{
			return redirect('/');
		}
	}
	public function post_add_price(Request $request){
		$data = $request->all();
		$validator = Validator::make(
			array(
				'video_price' =>$request->video_price,
				),
			array(
				'video_price' =>'required',
				)
			);
		if($validator->fails())
		{
			return redirect('addPrice')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$id=Auth::user()->profile_id;
			if(DB::table('profiles')->where('ProfileId', $id)->update(['VideoPrice' => $request->video_price])){
				return redirect('addPrice')->with('success',"You have successfully updated  your video request price");
			}
			else
			{
				return view('frontend.artistDashboard.addPrice');
			}
		}
	}
	/*------------------------------Media CSs-------------------------------*/
	public function media() {
	}
	public function get_media(Request $request) {
		return view('frontend.artistDashboard.media');
	}
	/*--------------------------------Reset----------------------------------*/
	public function forget_password_verify($email) {
		$email = decrypt($email);
		$result = DB::table('users')->where('auth_reset_pass', $email)->first();
		if(count($result)>0){
			return redirect('reset')->with('email',$result->email);
		}
		else{
			return redirect('reset');
		}
	}
	/*-------------------------------------Reset--------------------------*/
	public function password_reset() {
		if(Auth::check()){
			if(Auth::user()->type=="Artist"){
				return redirect('/');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				return redirect('admin_dashboard');
			}
		}
		else{
			return view('frontend.reset');
		}
	}
	public function post_password_reset(Request $request) {
		$data = $request->all();
		$validator = Validator::make($data,
			array(
				'password' =>'required|min:8',
				'c_password' =>'required|min:8|same:password'
				)
			);
		if($validator->fails()){
			return redirect('reset')
			->withErrors($validator)
			->withInput();
		}else{
			$pass=$request->password;
			$enc_pass=Hash::make($pass);
			if(DB::table('users')->where('email', $request->email)->update(['password' => $enc_pass])){
				$auth_pass_re='';
				DB::table('users')->where('email', $request->email)->update(['auth_reset_pass' => $auth_pass_re]);
				Session::flush();
				return redirect('reset')->with('login_error',"You have successfully reset your Password");
			}
		}
	}
	/*----------------------------Forget Password-----------------------------------*/
	public function get_forget_pass() {
		if(Auth::check()){
			if(Auth::user()->type=="Artist"){
				return redirect('/');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				return redirect('admin_dashboard');
			}
		}
		else{
			return view('frontend.forget');
		}
	}
	public function forgetpass(Request $request){
		$email = DB::table('profiles')->where('EmailId',$request->email)->first();
		$auth_pass = str_random(15);
		$confirmation_code['confirmation_code'] = encrypt($auth_pass);
		DB::table('users')->where('email', $request->email)->update(array('auth_reset_pass' => $auth_pass));
		if(count($email) > 0){
			Mail::send('emails.forget_reminder',$confirmation_code, function ($message) use ($request) {
				$message->from('codingbrains6@gmail.com', 'Reset Password');
				$message->to($request->email,'rajesh');
				$message->subject('Reset Password');
			});
			return redirect('artist_login')->with('login_error',"Please Check Your Email to get Password");
		}
		else{
			return redirect('forget_pass')->with('forget_error',"Email doesn't Exist");
		}
	}
	/*-----------------------Artist Registration------------------------------*/
	public function artist_register() {
		if(Auth::check()){
			if(Auth::user()->type=="Artist"){
				return redirect('/');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				return redirect('admin_dashboard');
			}
		}
		else{
			return view('frontend.artist_registration');
		}
	}
	public function register(Request $request){
		$validator = Validator::make(
			array(
				'username' =>$request->username,
				'artistEmail' =>$request->artistEmail,
				'artistPassword' =>$request->artistPassword,
				'confirmpassword' =>$request->confirmpassword,
				'dob' =>$request->dob,
				'phone' =>$request->phone,
				'gender' =>$request->gender,
				'profile' =>$request->file('profile'),
				),
			array(
				'username' =>'required',
				'artistEmail' =>'required|email|unique:users,email',
				'artistPassword' =>'required|alpha_num|min:6',
				'confirmpassword' =>'required|same:artistPassword',
				'dob' =>'required|date',
				'phone' =>'required|digits:10',
				'gender' =>'required',
				'profile' => 'required|mimes:jpeg,png',
				)
			);
		if($validator->fails())
		{
			return redirect('artist_register')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$email = DB::table('profiles')->where('EmailId',$request->email)->first();
			if(count($email) > 0){
				return redirect('artist_register')->with('register_error',"Email Already Exist");
			}
			else
			{
				$file = $request->file('profile');
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				$profile_path = "http://videorequestlive.com/images/Artist/".date('U').'.jpg';
				$users = new User();
				$Profile = new Profile();
				$is_account_active=0;
				$is_email_active=0;
				$type='Artist';
				$users->user_name= $request->username;
				$users->email= $request->artistEmail;
				$users->password= Hash::make($request->artistPassword);
				$users->remember_token = $request->_token;
				$users->is_account_active = $is_account_active;
				$users->is_email_active = $is_email_active;
				$users->gender = $request->gender;
				$users->type = $type;
				$users->date_of_birth = $request->dob;
				$users->phone_no = $request->phone;
				$Profile->Name= $request->username;
				$Profile->EmailId= $request->artistEmail;
				$Profile->Type = $type;
				$Profile->Gender = $request->gender;
				$Profile->DateOfBirth = $request->dob;
				$Profile->MobileNo = $request->phone;
				$Profile->profile_path= $profile_path;
				$Profile->profile_url= strtolower($request->username);
				$Profile->BannerImg ="images/vrl_bg.jpg";
				$Profile->video_background ="images/vrl_bg.jpg";
				$Profile->VideoPrice =30;
				$destinationPath = base_path() . '/public/images/Artist/';
				$request->file('profile')->move($destinationPath, $profile_path);
				$Profile->save();
				$profile_id = $Profile->ProfileId;
				$users->profile_id = $profile_id;
				$auth_pass = str_random(15);
				$users->auth_pass = $auth_pass;
				$confirmation_code['confirmation_code'] = encrypt($auth_pass);
				if($users->save()){
					Mail::send('emails.reminder', $confirmation_code, function ($message) use ($request) {
						$message->from('codingbrains6@gmail.com', 'Registration Confirmation');
						$message->to($request->artistEmail, $request->username);
						$message->subject('Email Confirmation');
					});
					return redirect('artist_register')->with('success','Successfully Registered');
				}
				else{
					return redirect('artist_register')->with('register_error',"Oops..!Something went wrong");
				}
			}
		}
	}
	/*-----------------------------------Artist Login-------------------------------------*/
	public function login() {
		if(Auth::check()){
			if(Auth::user()->type=="Artist"){
				return redirect('/');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				return redirect('admin_dashboard');
			}
		}
		else{
			return view('frontend.artist_login');
		}
	}
	public function artist_login(Request $request){
		$validator = Validator::make(
			array(
				'email' =>$request->email,
				'password' =>$request->password
				),
			array(
				'email' =>'required|email',
				'password' =>'required|alpha_num|min:6'
				)
			);
		if($validator->fails())
		{
			return redirect('artist_login')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$email=$request->email;
			$password=$request->password;
			$is_email_active = User::is_email_active($email);
			$is_account_active = User::is_account_active($email);
			if($is_email_active == "0"){
				return redirect('artist_login')->with('login_error',"'You need to confirm your account. We have sent you an activation code, please check your email.'");
			}
			elseif ($is_account_active == "0") {
				return redirect('artist_login')->with('login_error',"Your Account is deactiveated.");
			}
			else{
				$login_result = User::where('email',$email)->first();
				if(count($login_result)>0){
					$user_type = $login_result->type;
					if($user_type=='Artist'){
						$user = array('email' =>$email,'password' =>$password);
						if(Auth::attempt($user)){
							Auth::attempt($user);
							Session::put('name',Auth::user()->user_name);
							Session::put('email',Auth::user()->email);
							return redirect('/');
						}
						else{
							return redirect('artist_login')->with('login_error',"Invalid email or password");
						}
					}
					else{
						return redirect('artist_login')->with('login_error',"Invalid email or password");
					}
				}
				else{
					return redirect('artist_login')->with('login_error',"Invalid email or password");
				}
			}
		}
	}
	/*-----------------------------------Email Verification-----------------------------------*/
	public function verify_email($auth_pass){
		if(Auth::check()){
			if(Auth::user()->type=="Artist"){
				return redirect('/');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				return redirect('admin_dashboard');
			}
		}
		else{
			$auth_pass = decrypt($auth_pass);
			$result = DB::table('users')->where('auth_pass','=',$auth_pass);
			if(count($result)>0){
				if(User::where('auth_pass','=',$auth_pass)->update(array('is_email_active' => 1 ,'is_account_active' => 1,'auth_pass' => '' ))){
					Session::put('success',"Email Verified ! Now Login");
					return redirect('artist_login');
				}
				else{
					Session::put('login_error',"Oops..! Something Went wrong");
					return redirect('artist_login');
				}
			}
		}
	}
	public function verify_user_email($auth_pass){
		if(Auth::check()){
			if(Auth::user()->type=="Artist"){
				return redirect('/');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				return redirect('admin_dashboard');
			}
		}
		else{
			$auth_pass = decrypt($auth_pass);
			$result = DB::table('users')->where('auth_pass','=',$auth_pass);
			if(count($result)>0){
				if(User::where('auth_pass','=',$auth_pass)->update(array('is_email_active' => 1 ,'is_account_active' => 1,'auth_pass' => '' ))){
					return redirect('UserLogin')->with('verify_email','verifying email success');
				}
				else{
					echo "Oops..! Something Went wrong";
				}
			}
		}
	}
	/*-----------------------------------Artist Dashboard-----------------------------------*/
	public function video_requests(){
		$user =  User::where('email',Auth::user()->email)->first();
		$video_request = DB::table('requestvideos')->where('requestToProfileId',$user->profile_id)
		->where('RequestStatus','<>','reject')
		->where('is_active','=','1')
		->orderBy('created_at')
		->limit(5)
		->get();
		$image_path = DB::table('profiles')->where('EmailId', $user->email)->first();
		$artist_data = array();
		$artist_data['users'] = $user;
		$artist_data['video_requests'] = $video_request;
		$artist_data['image_paths'] = $image_path;
		return view('frontend.artistDashboard.video_requests',$artist_data);
	}
	/*-----------------------------------Dashboard-------------------------------------*/
	public function get_dashboard(){
		if(Auth::check()){
			if(Auth::user()->type=="Admin"){
				return redirect('admin_dashboard');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				$user =  User::where('email',Auth::user()->email)->first();
				$video_request = DB::table('requestvideos')->where('requestToProfileId',$user->profile_id)
				->where('RequestStatus','<>','reject')->orderBy('created_at')->limit(5)->get();
				$image_path = DB::table('profiles')->where('EmailId', $user->email)->first();
				$artist_data = array();
				$artist_data['users'] = $user;
				$artist_data['video_requests'] = $video_request;
				$artist_data['image_paths'] = $image_path;
				return view('frontend.artistDashboard.dashboard',$artist_data);
			}
		}
		else{
			return redirect('/');
		}
	}
	/*-----------------------Artist Profile------------------------------*/
	public function ArtistProfile(){
		if(Auth::check()){
			if(Auth::user()->type=="Admin"){
				return redirect('admin_dashboard');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				return view('frontend.ArtistProfile');
			}
		}
		else{
			return redirect('/');
		}
	}
	/*-----------------------Artist uploads Video------------------------------*/
	public function upload_video($id){
		if(Auth::check()){
			if(Auth::user()->type=="Admin"){
				return redirect('admin_dashboard');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				$artist =  Profile::where('EmailId',Auth::user()->email)->first();
				$Requestor =  Profile::where('ProfileId',$id)->first();
				$artist_data['artist'] = $artist;
				$artist_data['requestors'] = $Requestor;
				$artist_data['baseurl'] = "http://videorequestlive.com/";
				return view('frontend.artistDashboard.upload_video',$artist_data);
			}
		}
		else{
			return redirect('/');
		}
	}
	/*-----------------------Artist Header upload------------------------------*/
	public function upload_header(){
		if(Auth::check()){
			if(Auth::user()->type=="Admin"){
				return redirect('admin_dashboard');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				$artist =  Profile::where('EmailId',Auth::user()->email)->first();
				$artist_data['artist'] = $artist;
				$artist_data['baseurl'] = "http://videorequestlive.com/";
				return view('frontend.artistDashboard.upload_header',$artist_data);
			}
		}
		else{
			return redirect('/');
		}
	}
	public function upload_header_image(Request $request){
		$validator = Validator::make($request->all(),
			array(
				'header' => 'mimes:jpeg,png',
				)
			);
		if($validator->fails())
		{
			return redirect('/upload_header')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$artist = Profile::find(Auth::user()->profile_id);
			if($request->file('header') != ""){
				$file = $request->file('header');
				$filename = $file->getClientOriginalName();
				$profile_path = "images/Artist/".$request->username.date('U').$filename;
				$destinationPath = base_path() . '/public/images/Artist/';
				$request->file('header')->move($destinationPath, $profile_path);
				$profile_path = "images/Artist/".$request->username.date('U').$filename;
				$artist->BannerImg = $profile_path;
			}
			if($artist->save()){
				$artists =  Profile::where('EmailId',Auth::user()->email)->first();
				$artist_data['artist'] = $artists;
				$artist_data['baseurl'] = "http://videorequestlive.com/";
				return view('frontend.artistDashboard.upload_header',$artist_data)->with('message','Header image Updated Successfully');
			}
		}
	}
	/*-----------------------Artist  videov Background Img upload-----------------*/
	public function upload_video_background(){
		if(Auth::check()){
			if(Auth::user()->type=="Admin"){
				return redirect('admin_dashboard');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				$artist =  Profile::where('EmailId',Auth::user()->email)->first();
				$artist_data['artist'] = $artist;
				$artist_data['baseurl'] = "http://videorequestlive.com/";
				return view('frontend.artistDashboard.upload_video_background',$artist_data);
			}
		}
		else{
			return redirect('/');
		}
	}
	public function uploadVideoBackground(Request $request){
		$validator = Validator::make($request->all(),
			array(
				'background' => 'mimes:jpeg,png',
				)
			);
		if($validator->fails())
		{
			return redirect('/upload_video_background')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$artist = Profile::find(Auth::user()->profile_id);
			if($request->file('video_background') != ""){
				$file = $request->file('video_background');
				$filename = $file->getClientOriginalName();
				$path = "images/Artist/".$request->username.date('U').$filename;
				$destinationPath = base_path() . '/public/images/Artist/';
				$request->file('video_background')->move($destinationPath, $path);
				$profile_path = "images/Artist/".$request->username.date('U').$filename;
				$artist->video_background = $path;
			}
			if($artist->save()){
				$artists =  Profile::where('EmailId',Auth::user()->email)->first();
				$artist_data['artist'] = $artists;
				$artist_data['baseurl'] = "http://videorequestlive.com/";
				return view('frontend.artistDashboard.upload_video_background',$artist_data)->with('message',' video Background image Updated Successfully');
			}
		}
	}
	/*-----------------------------Artist Change password--------------------------*/
	public function get_change_password() {
		if(Auth::check()){
			if(Auth::user()->type=="Admin"){
				return redirect('admin_dashboard');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				$profileData =  Profile::where('EmailId',Auth::user()->email)->first();
				$artistData['profileData'] = $profileData;
				$artistData['baseurl'] = "http://videorequestlive.com/";
				return view("frontend.artistDashboard.change-password",$artistData);
			}
		}
		else{
			return view('frontend.artist_login');
		}
	}
	public function change_password(Request $request){
		$validator = Validator::make(
			array(
				'old_password' =>$request->old_password,
				'new_password' =>$request->new_password,
				'confirm_password' =>$request->confirm_password
				),
			array(
				'old_password' =>'required',
				'new_password' =>'required|min:10',
				'confirm_password' =>'required|min:10|same:new_password'
				)
			);
		if($validator->fails())
		{
			return redirect('change-password')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$user = User::find(Auth::user()->user_id);
			$old_password=$request->old_password;
			$new_password=$request->new_password;
			if(Hash::check($old_password, $user->getAuthPassword())){
				$user->password = Hash::make($new_password);
				if($user->save()){
					return redirect('change-password')->with('success',"Password Changed Successfully");
				}
			}
			else{
				return redirect('change-password')->with('error',"Invalid  password");
			}
		}
	}
	/*-----------------------------------notifications-------------------------------*/
	public function notification() {
		if(Auth::check()){
			if(Auth::user()->type=="Admin"){
				return redirect('admin_dashboard');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				$user =  User::where('email',Auth::user()->email)->first();
				$notification = DB::table('notification')->select('notification.*','profiles.*')
				->join('profiles','profiles.ProfileId','=','notification.send_to')->get();
				$artist_data['users'] = $user;
				$artist_data['notifications'] = $notification;
				$artist_data['baseurl'] = "http://videorequestlive.com/";
			// print_r($artist_data);
				return view('frontend.artistDashboard.notifications',$artist_data);
			}
		}
		else{
			return redirect("/");
		}
	}
	/*-----------------------------------Artist profile Update-------------------------------------*/
	public function ProfileUpdate(){
		if(Auth::check()){
			if(Auth::user()->type=="Admin"){
				return redirect('admin_dashboard');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				$userData =  User::where('email',Auth::user()->email)->first();
				$profileData =  Profile::where('EmailId',Auth::user()->email)->first();
				$artistData['userData'] = $userData;
				$artistData['profileData'] = $profileData;
				$artistData['baseurl'] = "http://videorequestlive.com/";
				return view('frontend.artistDashboard.ProfileUpdate',$artistData);
			}
		}
		else{
			return redirect('/');
		}
	}
	public function ProfileUpdateForm(Request $request){
		$data = $request->all();
		$validator = Validator::make($data,
			array(
				'username' =>'required',
				'dob' =>'required',
				'phone' =>'required|Integer|min:10',
				'nickName'=>'required',
				'address' =>'required',
				'city' =>'required',
				'state' =>'required',
				'country' =>'required',
				'zip'=>'required|Integer|min:6',
				'profile' => 'mimes:jpeg,png',
				)
			);
		if($validator->fails()){
			return redirect('ProfileUpdate')
			->withErrors($validator)
			->withInput();
		}else{
			$artist = Profile::find($request->ProfileId);
			$artist->Name = $request->username;
			$artist->DateOfBirth = $request->dob;
			$artist->MobileNo = $request->phone;
			$artist->NickName = $request->nickName;
			$artist->Address = $request->address;
			$artist->City = $request->city;
			$artist->State = $request->state;
			if($request->file('profile') != ""){
				$file = $request->file('profile');
				$filename = $file->getClientOriginalName();
				$profile_path = "images/Artist/". date('U').'.jpg';
				$destinationPath = base_path() . '/public/images/Artist/';
				$request->file('profile')->move($destinationPath, $profile_path);
				$artist->profile_path = $profile_path;
			}
			$artist->country = $request->country;
			$artist->Zip = $request->zip;
			if($artist->save()) {
				return redirect('Dashboard')->with('message', 'Successfully Updated!');
			}
		}
	}
	/*---------------------------------update Video request----------------------------------*/
	public function update_video_request(Request $request){
		$data = $request->all();
		$validator = Validator::make(
			array(
				'set_price' =>$request->set_price,
				),
			array(
				'set_price' => 'required',
				)
			);
		if($validator->fails())
		{
			return redirect('video_requests')
			->withErrors($validator)
			->withInput();
		}
		else{
			$requestvideo = Requestvideo::find($request->VideoReqId);
			$artist =  Profile::find($requestvideo->requestToProfileId);
			$data['artist']=$artist->Name;
			$data['user']=$requestvideo->Name;
			$data['price']=$request->set_price;
			$data['complitionDate']=$requestvideo->complitionDate;
			$requestvideo->RequestStatus = $request->SetStatus;
			$requestvideo->VideoPrice = $request->set_price;
			if($requestvideo->save()){
				/*-------------Notification sends from here--------------*/
				// $notification =   new Notification();
				// $notification->send_from =  $requestvideo->requestToProfileId;
				// $notification->send_to =  $requestvideo->requestByProfileId;
				if($request->SetStatus == "approve"){
					// $notification->type =  "Approved ";
					// $notification->message =  $artist->Name ." " . "has Approved Your video Request";
					$user =  $request->requester;
					Mail::send('emails.video_response', $data, function ($message) use ($user) {
						$message->from('codingbrains6@gmail.com','VRL');
						$message->to($user,'User');
						$message->cc('codingbrains6@gmail.com', 'Super Administrator');
						$message->subject('Your Request have been Approved Please make payment so That Artist fulfill your request');
					});
				}
				else{
					// $notification->type =  "Rejected";
					// $notification->message =  $artist->Name . " " . "has Rejecteded Your video Request";
					$user =  Profile::find($request->requester);
					Mail::send('emails.video_request_reject', $data, function ($message) use ($user) {
						$message->from('codingbrains6@gmail.com','VRL');
						$message->to($user->EmailId,$user->Name);
						$message->cc('codingbrains6@gmail.com', 'Super Administrator');
						$message->subject('Your Request have been Rejected.');
					});
				}
				// $notification->date = Carbon::now();
				// $notification->isread = 0;
				// $notification->save();
				return redirect('Dashboard');
			}
			else{
				return redirect('Dashboard')->with('error','Oops ! Something is wrong');
			}
		}
	}
	/*-----------------------Artist Record Video------------------------------*/
	public function record_video() {
		if(Auth::check()){
			if(Auth::user()->type=="Admin"){
				return redirect('admin_dashboard');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				$profileData =  Profile::where('EmailId',Auth::user()->email)->first();
				$artistData['profileData'] = $profileData;
				$artistData['baseurl'] = "http://videorequestlive.com/";
				return view("frontend.artistDashboard.record_video",$artistData);
			}
		}
		else{
			return view('frontend.artist_login');
		}
	}
	public function record_own_video(Request $request){
		$data = $request->all();
		$validator = Validator::make(
			array(
				'video_title' =>$request->video_title,
				'video_description' => $request->video_description,
				'video_price' =>$request->video_price,
				'video' =>$request->file('video'),
				),
			array(
				'video_title' =>'required|unique:video,Title',
				'video_description' =>'required',
				'video_price' =>'required',
				'video' => 'required|mimes:mp4,mpeg',
				)
			);
		if($validator->fails())
		{
			return redirect('record_video')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$video = new Video();
			$file = $request->file('video');
			$extension = $file->getClientOriginalExtension();
			$filename = str_replace(' ', '', $file->getClientOriginalName());
			$filename = str_replace('-', '', $filename);
			$VideoURL = "http://videorequestlive.com/video/".date('U') .$filename ;
			$video->VideoFormat = $file->getClientOriginalExtension();
			$video->VideoSize = ($file->getSize()/1024) . "mb";
			$video->VideoPrice = $request->video_price;
			$video->Description = $request->video_description;
			$video->Title = $request->video_title;
			$video->VideoUploadDate = Carbon::now();
			$video->ProfileId	 = Auth::user()->profile_id;
			$video->UploadedBy	 = "Artist";
			$ffmpeg = FFMpeg\FFMpeg::create(array(
				'ffmpeg.binaries'  => '/usr/bin/ffmpeg',
				'ffprobe.binaries' => '/usr/bin/ffprobe',
				'timeout'          => 3600,
				'ffmpeg.threads'   => 12,
				));
			/*--------------------------Opening Uploaded Video------------------------------*/
			$rand = rand(11111,99999);
			$destination = base_path() . '/public/video/original/';
			$fileName = $rand.'.'.$extension;
			$request->file('video')->move($destination,$fileName);
			$destination_path= $destination.$fileName;
			$orginal_video = new OriginalVideo();
			$orginal_video->video_path=$destination_path;
			$orginal_video->save();
			$orginal_video_id= $orginal_video->id;
			$orginal_video = OriginalVideo::find($orginal_video_id);
			//dd($orginal_video->video_path);
			$uploaded_video = $ffmpeg->open($orginal_video->video_path);
			/*----------------------------retrieving Thumbnail------------------------------*/
			$video_thumbnail_path = base_path() . '/public/images/thumbnails/'.date('U').'.jpg';
			$uploaded_video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(2))->save($video_thumbnail_path);
			$video->VideoThumbnail	 = $video_thumbnail_path;
			/*----------------------------Applying Watermark----------------------------------*/
//$watermark =  base_path() . '/public/vrl_logo.png';
			//$uploaded_video
			//->filters()
			//->watermark($watermark, array(
			//	'position' => 'absolute',
			//'x' => 250,
			//	'y' => 250,
			//	));
			$ffmpegPath = '/usr/bin/ffmpeg';
			$inputPath = $orginal_video->video_path;
			$watermark = '/home/vrl/public_html/public/vrl_logo.png';
			$outPath = '/home/vrl/public_html/public/video/watermark/'.date('U').'.mp4';

			shell_exec("$ffmpegPath  -i $inputPath -i $watermark -filter_complex overlay=main_w-overlay_w-10:main_h-overlay_h-10 $outPath ");
			/*	----------------------------------Saving Video-------------------------------*/
			$watermark_video_destination = substr($outPath,28);
			//$format = new FFMpeg\Format\Video\X264('libmp3lame', 'libx264');
			//$uploaded_video->save($format, $watermark_video_destination);
			$video->VideoURL	 = $outPath;
			$ffprobe = FFMpeg\FFProbe::create(array(
				'ffmpeg.binaries'  => '/usr/lbin/ffmpeg',
				'ffprobe.binaries' => '/usr/bin/ffprobe',
				'timeout'          => 3600,
				'ffmpeg.threads'   => 12,
				));
			/*-------------------------retrieving Video Duration----------------------------*/
			$video->VideoLength = $ffprobe->streams($orginal_video->video_path)
			->videos()
			->first()
			->get('duration');
			// $destinationPath = base_path() . '/public/video/';
			// $request->file('video')->move($destinationPath, "video/".date('U') .$filename);
			if($video->save())
			{
				return redirect('record_video')->with('success','Video Successfully Uploaded');
			}
		}
	}
	/*-----------------------------------Sold video List-------------------------------------*/
	public function sold_videos() {
		if(Auth::check()){
			if(Auth::user()->type=="Admin"){
				return redirect('admin_dashboard');
			}
			elseif (Auth::user()->type=="User") {
				return redirect('profile');
			}
			else{
				$user =  User::where('email',Auth::user()->email)->first();
				$sold_videos = DB::table('video')->select('video.*','payments.*')
				->join('payments','payments.video_id','=','video.VideoId')->get();
				$sold_videos = DB::table('video')->select('video.*','payments.*')->where('ProfileId', '=',$user->profile_id)
				->join('payments',function($join){
					$join->on('video.VideoId', '=', 'payments.video_id');
				})->get();
				$image_path = DB::table('profiles')->where('EmailId', $user->email)->first();
				$artist_data['users'] = $user;
				$artist_data['sold_videos'] = $sold_videos;
				$artist_data['image_paths'] = $image_path;
				return view('frontend.artistDashboard.sold_video',$artist_data);
			}
		}
		else{
			return redirect('/');
		}
	}
	/*--------------------------------Artist Log Out--------------------------------*/
	public function getLogout() {
		Auth::logout();
		Session::flush();
		return redirect('/')->with('success','Successfully Signout');
	}
	public function videoDetails(Request $request){
		$data = DB::table('video')->where('VideoId',$request->id)->get();
		return view('frontend.VideoDetails')->with('detail',$data);
	}
	public function search_result(Request $request)
	{
		$search_query =  $request->search_query ;
		$search_result = Profile::where('Name', 'LIKE', '%'.$search_query.'%')
		->where('Type', '=', 'Artist')->get();
		$search_video = DB::table('video')->select('video.*','profiles.*')->where('Title', 'LIKE','%'.$search_query.'%')
		->join('profiles',function($join){
			$join->on('video.ProfileId', '=', 'profiles.ProfileId');
		})->get();
		$random_artist = Profile::where('Type', '=', 'Artist')->orderByRaw("RAND()")->orderBy('ProfileId','desc')->take(6)->get();
		$random_video = DB::table('video')->select('video.*','profiles.*')->orderByRaw("RAND()")->orderBy('VideoId','desc')->join('profiles',function($join){
			$join->on('video.ProfileId', '=', 'profiles.ProfileId');
		})->take(6)->get();
		$pageData['search_result'] = $search_result;
		$pageData['search_video'] = $search_video;
		$pageData['random_video'] = $random_video;
		$pageData['random_artist'] = $random_artist;
		return view('frontend.search',$pageData);
	}
	public function get_social_link()
	{
		$profileData =  Profile::where('EmailId',Auth::user()->email)->first();
		$artistData['profileData'] = $profileData;
		$artistData['baseurl'] = "http://videorequestlive.com/";
		return view('frontend.artistDashboard.get_social_link',$artistData);
	}
	public function add_social_link(Request $request)
	{
		$data = $request->all();
		$validator = Validator::make($data,
			array(
				'facebook_link' =>'required',
				'twitter_link' =>'required',
				'instagram_link' =>'required',
				)
			);
		if($validator->fails()){
			return redirect('get_social_link')
			->withErrors($validator)
			->withInput();
		}else{
			$artist = Profile::find($request->ProfileId);
			$artist->facebook_link = $request->facebook_link;
			$artist->instagram_link = $request->instagram_link;
			$artist->twitter_link = $request->twitter_link;
			if($artist->save()) {
				return redirect('get_social_link')->with('success', 'Successfully Updated!');
			}
		}
	}
	public function get_edit_url()
	{
		$profileData =  Profile::where('EmailId',Auth::user()->email)->first();
		$artistData['profileData'] = $profileData;
		$artistData['baseurl'] = "http://videorequestlive.com/";
		return view('frontend.artistDashboard.edit_url',$artistData);
	}
	public function update_url(Request $request)
	{
		$data = $request->all();
		$validator = Validator::make($data,
			array(
				'profile_url' =>'required|alpha_num|unique:profiles,profile_url',
				)
			);
		if($validator->fails()){
			return redirect('edit_url')
			->withErrors($validator)
			->withInput();
		}else{
			$artist = Profile::find($request->ProfileId);
			$artist->profile_url = $request->profile_url;
			if($artist->save()) {
				return redirect('edit_url')->with('success', 'Successfully Updated!');
			}
		}
	}
	/*--------------------------------Request New Video---------------------------------*/
	public function requestvideo(Request $request){
		$data = $request->all();
		$validator = Validator::make($data,
			array(
				'video_title'=>'required',
				'user_email'=>'required|email',
				'video_delivery_time'=>'required',
				'artist'=>'required',
				'video_description'=>'required',
				'user_name'=>'required',
				'user_zip'=>'required|min:6',
				'user_city'=>'required',
				'user_state'=>'required',
				'user_country'=>'required',
				'user_state'=>'required',
				'user_phone'=>'required|integer|min:10|max:10',
				)
			);
		if($validator->fails()){
			$previous_url = url()->previous();
			$findme   = 'http://videorequestlive.com/RequestNewVideo/';
			$pos = strpos($previous_url, $findme);
			if($pos !== false){
				return redirect('RequestNewVideo/'.$request->artist)
				->withErrors($validator)
				->withInput();
			}
			else{
				return redirect('/')
				->withErrors($validator)
				->withInput();
			}
		}else{
			$Status="Pending";
			$Requestvideo= new Requestvideo();
			$Requestvideo->requestToProfileId=$request->artist;
			$Requestvideo->requestor_email=$request->user_email;
			$Requestvideo->Title=$request->video_title;
			$Requestvideo->Description=$request->video_description;
			$Requestvideo->RequestStatus=$Status;
			$Requestvideo->complitionDate=$request->video_delivery_time;
			$Requestvideo->is_active=0;
			$Requestvideo->save();
			if($Requestvideo->save()){
				$confirmation_code['user_email'] =$request->user_email;
				$confirmation_code['video_title'] =$request->video_title;
				$confirmation_code['video_description'] = $request->video_description;
				$confirmation_code['current_status'] = $Status;
				$confirmation_code['video_delivery_time'] = $request->video_delivery_time;
				$artist =  Profile::where('ProfileId',$request->artist)->first();
				$confirmation_code['artist_name']=$artist->Name;
				if($Requestvideo->save()){
					Mail::send('emails.User_RequestNewVideo', $confirmation_code, function ($message) use ($request) {
						$message->from('codingbrains6@gmail.com', 'Confirmation for Video Request');
						$message->to($request->user_email, $request->user_email);
						$message->subject('Successfully requested video');
					});
					Mail::send('emails.admin_RequestNewVideo', $confirmation_code, function ($message) use ($request) {
						$message->from('codingbrains6@gmail.com', 'Confirmation for Video Request');
						$message->to('codingbrains6@gmail.com', $request->user_email);
						$message->subject('Requested New video');
					});
				}
				$successmsg="Your Request have been Submitted Successfully.";
				return redirect('/')->with('success',$successmsg);
			}
		}
			//print_r($request->all());
	}
}
