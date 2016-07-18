<?php

namespace App;

use Laravel\Cashier\Billable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{

    use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
    'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];

    public static function is_email_verify($email)
    {
        $result = DB::table('users')->where('email','=',$email)->first();
        if(count($result)>0){

            return  $result->is_email_verify;
        }
    }
    public static function is_mobile_verify($email)
    {
        $result = DB::table('users')->where('email','=',$email)->first();
        if(count($result)>0){
            return  $result->is_mobile_verify;
        }
    }
}
