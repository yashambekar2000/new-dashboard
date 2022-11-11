<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Exception\Auth\InvalidPassword;
use Auth;

class DashbordController extends Controller
{

        // *****************after login*******************
function dashboardHome(){
   
   //##################  aunthenticate http requests   ######################
//     if(Auth::guest()){
// return redirect('/');
//     }
   
    return view('dashboard_home');
}


//-----------------------------Getting Devoters list---------------------------------------
    public function devotersList(){
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
 
        $database = $firebase->createDatabase();
 
        $details = $database->getReference('/devotersList');
        // $details=$details->getvalue();

         $details=$details->getvalue() ;
         

         return view('devoters_list', ['details1'=>$details]);
    }

    //--------------------send on form page--------------------------------
function sendForm(){
    return view('devoter_form');
}




//------------------------------Save Devoter-----------------------------------
function addDevoter(Request $request){
      
    $this->validate($request , [
        'name' => 'required|max:120|string',
        'email'  => 'required|email',
        'mobile' => 'required|regex:/^[0-9]{10}$/',
        'address' => 'required|string'
     ]);


    $firebase = (new Factory)
    ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');

$database = $firebase->createDatabase();

$details = $database->getReference('/devotersList');

$saveData = [
    'name' => $request->name,
    'email'=>$request->email,
    'mobile'=>$request->mobile,
    'address'=>$request->address,
];

// $saveData = [
//     'name' => "Abcd",
//     'email'=>"abcd@d.com",
//     'mobile'=>1234567890,
//     'address'=>"asdfghjkl",
// ];

$saveRef = $database->getReference('/devotersList')->push($saveData);

if($saveRef){
    return redirect('devoters/devoter-form')->with('addsuccess', true);

}else{
    return redirect('devoters/devoter-form')->with('addfail', true); 
}

}



 //---------------------Update Devotee Details--------------------------------
function update($id){

    
    $firebase = (new Factory)
    ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');

$database = $firebase->createDatabase();

$editData = $database->getReference("/devotersList/$id")->getvalue();

if($editData){
    return view('devoter_updateForm' , compact('editData','id'));
}
else{
    return redirect('devoter/{id}')->with('notfound', true);
}

}


//------------------------saving the updated details-----------------------------
function updateDetails(Request $request , $id){

    $this->validate($request , [
        'name' => 'required|max:120|string',
        'email'  => 'required|email',
        'mobile' => 'required|regex:/^[0-9]{10}$/',
        'address' => 'required|string'
     ]);



    $firebase = (new Factory)
    ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');

$database = $firebase->createDatabase();

$updateData = [
    'name' => $request->name,
    'address' => $request->address,
    'mobile' => $request->mobile,
    'email' => $request->email,
];

$res_updated = $database->getReference("/devotersList/$id")->update($updateData);

if($res_updated){
    return redirect('devoters')->with('updatesuccess' , true);
}else{
    return redirect('devoter/{id}')->with('updatefail' , true);
}

}


//--------------------Delete Devotee Details---------------------------------
function delete($id){
    $firebase = (new Factory)
    ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');

$database = $firebase->createDatabase();

$deleteData = $database->getReference("/devotersList/$id")->remove();

if($deleteData){
    return redirect('devoters')->with('deletesuccess' , true);
}else{
    return redirect('devoters')->with('deletefail' , true);
}
}



//-----------------------to display the Donation List On click donation button----------------
    function donationlist(){

            $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
        
        $database = $firebase->createDatabase();
        
        $details = $database->getReference('/donorData');
        // $details=$details->getvalue();
        
         $details=$details->getvalue() ;
         
        
        return view('donation_list' , ['details2'=>$details ]);
        
        }


     
     
        //----------------to display the Expenses list on click Expense button-------------
        function expenseList(){
            $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
        
        $database = $firebase->createDatabase();
        
        $details = $database->getReference('/expensesList');
        // $details=$details->getvalue();
        
         $details=$details->getvalue() ;
         
         return view('expenses_list' , ['details1'=> $details ]);

        }


      
      
        //-----------------to add and show message after successfully add expense-------------
        function expenseAdd(Request $request){

            $this->validate($request , [
                'description' => 'required|string|max:100',
                'amount' => 'required|numeric|min:1',
             ]);


            $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
        
            $database = $firebase->createDatabase();
        
         $current_date = date('d-m-Y');
            $postData = [
                'description' => $request->description,
                'amount'=>$request->amount,
                'date' => $current_date,
            ];
            $postRef = $database->getReference('/expensesList')->push($postData);

            if($postRef){
                return redirect('expenses')->with('expensesuccess' , true);

            }else{
                return redirect('expenses')->with('expensefail' , true); 
            }
         
        }

      
      
        // ******************to show users list*****************************
        function showUsers(){
            $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
        
        $database = $firebase->createDatabase();
        
        $details = $database->getReference('/users');
        $admindetails = $database->getreference('/admin');
        // $details=$details->getvalue();
        
         $userList=$details->getvalue() ;
         $adminList=$admindetails->getvalue() ;
         return view('user_management' , ['userList'=> $userList , 'adminList'=> $adminList ]);
      
        }

       
       
        //*************************** To Save The New User**************************** */
function saveUser(Request $request){
  
  //*************************check Admin Password***************** */
             $adminPassword=$request->adminPassword;

                     //   ----------Connect with database-----------------
                        $firebase = (new Factory)
                        ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
                        ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
  
  
                     // $this->auth = $factory->createAuth();
                    $database = $firebase->createDatabase();
  
                     // ----------fetching data from database------------------------
                     $admindetails = $database->getReference('/admin');

                        $admindetails=$admindetails->getvalue();

                foreach($admindetails as $id=>$detail){
                     if( $detail['password']==($adminPassword)){
    
                       $this->validate($request , [
                           'name' => 'required|max:120|string',
                           'email'  => 'required|email',
                           'mobile' => 'required|regex:/^[0-9]{10}$/',
                           'password' => 'string|min:7',
                           'confirmpassword' =>  'required_with:password|same:password|min:7'
                        ]);


                        $firebase = (new Factory)
                        ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
                        ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');

                         $database = $firebase->createDatabase();


                             $postData = [
                            'name' => $request->name,
                            'email'  => $request->email,
                            'mobile' => $request->mobile,
                            'password' => $request->password
                             ];
             $postRef = $database->getReference('/users')->push($postData);

            if($postRef){
                 return redirect('addusers')->with('addsuccess' , true);
                 }
            else{
                 return redirect('addusers')->with('addfail' , true); 
                }
  
        }
        else{
            return redirect('addusers')->with('status' , 'Admin Password Does not Matches.');
            }
    }
}

//*************************** update User *********************************/
function updateUser(Request $request , $id){

                        //*************************check Admin Password***************** */
                                $adminPassword=$request->adminPassword;

                        //   ----------Connect with database-----------------
                                $firebase = (new Factory)
                                ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
                                ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
                             $database = $firebase->createDatabase();
  
                         // ----------fetching data from database------------------------
                                 $admindetails = $database->getReference('/admin');

                                 $admindetails=$admindetails->getvalue();

   
                 foreach($admindetails as $id=>$detail){
                     if( $detail['password']==($adminPassword)){

                             $firebase = (new Factory)
                                ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
                                ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
                                     $database = $firebase->createDatabase();
                                     $editUser = $database->getReference("/users/$id")->getvalue();

                         if($editUser){
                                    return view('Update_user' , compact('editUser','id'));
                                     }
                             else{
                                    return redirect('users')->with('notfound', true);
                                }
                 }
         else{
                 return redirect('users')->with('status' , 'Admin Password Does not Matches.');
             }
    }
}


//********************************* Add Updated Data Of User ******************************* */
function addUpdateUser(Request $request , $id){
                         $this->validate($request , [
                                'name' => 'required|max:120|string',
                                'email'  => 'required|email',
                                'mobile' => 'required|regex:/^[0-9]{10}$/',
                                'password' => 'required|string'
                             ]);



                        $firebase = (new Factory)
                            ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
                            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
                                $database = $firebase->createDatabase();
                                    
                    $updateData = [
                        'email' => $request->email,
                        'name' => $request->name,
                        'password' => $request->password,
                        'mobile' => $request->mobile,
                        ];

                    $user_updated = $database->getReference("/users/$id")->update($updateData);

            if($user_updated){
                        return redirect('users')->with('updatesuccess' , true);
                        }
                        else{
                             return redirect('Update_user')->with('updatefail' , true);
                            }
     }


     //************************ Delete User ********************************* */
function deleteUser(Request $request , $id){
  
                 //*************************check Admin Password***************** */
                            $adminPassword=$request->adminPassword;

                        //   ----------Connect with database-----------------
                    $firebase = (new Factory)
                        ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
                        ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
                            $database = $firebase->createDatabase();

                        // ----------fetching data from database------------------------
                            $admindetails = $database->getReference('/admin');
                            $admindetails=$details->getvalue();

                            foreach($admindetails as $id=>$detail){
                                    if( $detail['password']==($adminPassword)){

                                            $firebase = (new Factory)
                                                ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
                                                ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');

                                    $database = $firebase->createDatabase();
                                    $deleteUser = $database->getReference("/users/$id")->remove();

                        if($deleteUser){
                                    return redirect('users')->with('deletesuccess' , true);
                                    }
                                    else{
                                        return redirect('users')->with('deletefail' , true);
                                        }
                    }
                     else{
                        return redirect('users')->with('status' , 'Admin Password Does not Matches.'); 
                        }

            }
}


}
