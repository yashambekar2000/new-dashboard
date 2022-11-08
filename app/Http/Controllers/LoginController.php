<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Exception\Auth\InvalidPassword;
use Auth;

class LoginController extends Controller
{
    function index1(){
        return view('Login');
    }


   


     // ---------validate email and password--------------
     function checklogin(Request $request){
 
        $this->validate($request , [

           'email'  => 'required|email',
           'password' => 'required|alphaNum|min:7'
        ]);


        $user_data = array(
           'email'  => $request->get('email'),
           'password' => $request->get('password')

        );

//    ----------Connect with database-----------------
    $firebase = (new Factory)
    ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/login');


    // $this->auth = $factory->createAuth();
$database = $firebase->createDatabase();

// ----------fetching data from database------------------------
$details = $database->getReference('/');


// ------------convert fetched data into an array---------------
 $details=$details->getvalue() ;


for($i=0;$i<sizeOf($details);$i++){
   if( $details[$i]['username']==($user_data['email'])){
    if($details[$i]['password']==($user_data['password'])){
     return (new DashbordController)->index();
    }else{
        return back()->withErrors(['Credentials are incorrect']);  
    }
   }else{
    return back()->withErrors(['Credentials are incorrect']);  
   }
}
     }

}
