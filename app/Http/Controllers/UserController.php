<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

	public function get_my_account(){

		return view('user.myaccount');
	}

	public function get_my_adds(){

		return view('user.my-adds');
	}

	public function get_statements(){

		return view('user.statements');
	}

}