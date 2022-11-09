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
    return view('dashboard_home');
}

//  ***************************to send devoters list**************
    public function devotersList()
    {
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/devotersList');
 
        $database = $firebase->createDatabase();
 
        $details = $database->getReference('/');
        // $details=$details->getvalue();

         $details=$details->getvalue() ;

         return view('devoters_list', ['details1'=>$details]);
    }

// *************************to send form**************************
function sendForm(){
    return view('devoter_form');
}

    //---------------------Update Devotee Details--------------------------------
function update($id){
  
    $key = $id;
    $firebase = (new Factory)
    ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/devotersList');

$database = $firebase->createDatabase();

$editData = $database->getReference("/$key")->getvalue();

if($editData){
    return view('devoter_updateForm', ['editData'=>$editData, 'id'=>$key]);
}
else{
    return redirect('devoters_list')->with('status','user not found');
}

}


//------------------------saving the updated details-----------------------------
function updateDetails(Request $request,$id){
    $firebase = (new Factory)
    ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/devotersList');

$database = $firebase->createDatabase();

$updateData = [
    'name' => $request->name,
    'address' => $request->address,
    'mobile' => $request->mobile,
    'email' => $request->email,
];

$res_updated = $database->getReference("/$id")->update($updateData);

if($res_updated){
    return redirect('devoters')->with('updatesuccess' , true);
}else{
    return redirect('devoters')->with('updatefail' , true);
}

}


//--------------------Delete Devotee Details---------------------------------
function delete($key){
    $firebase = (new Factory)
    ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/devotersList');

$database = $firebase->createDatabase();
$key ;
$deleteData = $database->getReference("/$key")->remove();

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
            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/donorData');
        
        $database = $firebase->createDatabase();
        
        $details = $database->getReference('/');
        // $details=$details->getvalue();
        
         $details=$details->getvalue() ;
         
        
        return view('donation_list' , ['details2'=>$details ]);
        
        }


     
     
        //----------------to display the Expenses list on click Expense button-------------
        function expenseList(){
            $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/expensesList');
        
        $database = $firebase->createDatabase();
        
        $details = $database->getReference('/');
        // $details=$details->getvalue();
        
         $details=$details->getvalue() ;
         
         return view('expenses_list' ,['details1'=>$details]);

        }


      
      
        //-----------------to add and show message after successfully add expense-------------
        function expenseAdd(Request $request){
            $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/expensesList');
        
            $database = $firebase->createDatabase();
        
            $postData = [
                'description' => $request->description,
                'amount'=>$request->amount
            ];
            $postRef = $database->getReference("/")->push($postData);

            if($postRef){
                return redirect('expenses')->with('expensesuccess' , true);

            }else{
                return redirect('expenses')->with('expensefail' , true); 
            }
         
        }

        // ******************to send users list***************
        function showUsers(){
            return view('user_management');
        }
}
