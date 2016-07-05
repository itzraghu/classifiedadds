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


}


