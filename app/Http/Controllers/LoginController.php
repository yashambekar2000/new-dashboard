<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Exception\Auth\InvalidPassword;
use Auth;
use Session;

class LoginController extends Controller
{

    //---------------------------to show login page---------------------------
    function index1(){
        return view('Login');
    }


   


     // ---------validate email and password--------------
     function checklogin(Request $request){
 
        $this->validate($request , [

           'email'  => 'required|email',
           'password' => 'required|alphaNum|min:7'
        ]);


  
     $email=$request->email;
    $password=$request->password;

                     $firebase = (new Factory)
                        ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
                        ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
    
                            $database = $firebase->createDatabase();
    
                    // ----------fetching data from database------------------------
                            $detailsadmin = $database->getReference('/admin');
                             $details = $database->getReference('/users');


                    // ------------convert fetched data into an array---------------
                            $details=$details->getvalue() ;
    
                          $detailsadmin=$detailsadmin->getvalue();
                          
 //------------------to authenticate email and password for admin --------------------
             foreach($detailsadmin as $adminid=>$detailadmin){
                        if( $detailadmin['email']==($email)){
                                if($detailadmin['password']==($password)){

                                         $request->session()->put('id' , $adminid);
                                         $request->session()->put('name', $detailadmin['name']);
                                         $request->session()->put('email', $detailadmin['email']);
                                            
                                return redirect('/dashboard');
                            }
                        }
         //------------------to authenticate email and password for User--------------------
                    foreach($details as $id=>$detail){
                            if( $detail['email']==($email)){
                                if($detail['password']==($password)){
             
                                            $request->session()->put('id' , $id);
                                            $request->session()->put('name', $detail['name']);
                                            $request->session()->put('email', $detail['email']);
                                    
                                return redirect('/dashboard');
                            }
                            else{
                                    return redirect('/')->with('status',"Email or password does not match");
                             }
            }
            
        }
         return redirect('/')->with('status',"Email or password does not match");

    }

  }


     function logout(){
       
     Session::flush();
        return redirect('/');
        
    }
    
    }



