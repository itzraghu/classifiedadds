<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use Auth;

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

	public function get_forgot_password(){

		return view('webfront.forgot-password');

	}

	public function get_signup(){

		return view('webfront.signup');
	}

	public function get_adds_form(){

		return view('webfront.adds-form');

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


