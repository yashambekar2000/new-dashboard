<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Exception\Auth\InvalidPassword;
use Auth;

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

       

        // $session = DB::table('users')->where('email', $email)->where('password', $password)->get();
        //     if(count($session)>0){
        //         $request->session()->put('id',$session[0]->id);
        //         $request->session()->put('name',$session[0]->name);
        //         $request->session()->put('email',$session[0]->email);
        //         return redirect('/dashboard');
                
        //     }
        //     else{
        //         return redirect('/')->with('status',"Email or password does not match");
        //     }

  
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
             foreach($detailsadmin as $id=>$detailadmin){
                        if( $detailadmin['email']==($email)){
                                if($detailadmin['password']==($password)){

                                         $request->session()->put('id' , $id);
                                         $request->session()->put('name', $detailadmin['name']);
                                         $request->session()->put('email', $detailadmin['email']);
                                            
                                return redirect('/dashboard');
                            }
                            else{
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
            else{
                     return redirect('/')->with('status',"Email or password does not match");
                }
        }
    }
}
else{
        //------------------to authenticate email and password--------------------
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
            else{
                    return redirect('/')->with('status',"Email or password does not match");
            }
        }
    }
}

  



// for($i=0;$i<sizeOf($details);$i++){
//    if( $details[$i]['email']==($user_data['email'])){
//     if($details[$i]['password']==($user_data['password'])){
//      return (new DashbordController)->index();
//     }else{
//         return back()->withErrors(['Credentials are incorrect']);  
//     }
//    }else{
//     return back()->withErrors(['Credentials are incorrect']);  
//    }
// }

     }


     function logout(){
        // auth()->logout();
        // return redirect()->route('/');
    
        // Auth::guard('web')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // return redirect('/');
    
        Session::flush();
        return redirect('/');
    }
    
    }



