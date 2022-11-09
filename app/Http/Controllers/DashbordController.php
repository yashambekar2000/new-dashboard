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
        'mobile' => 'required|min:11|numeric',
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
    return redirect('devoter/{id}')->with('status','user not found');
}

}


//------------------------saving the updated details-----------------------------
function updateDetails(Request $request,$id){

    $this->validate($request , [
        'name' => 'required|string',
        'email'  => 'required|email',
        'mobile' => 'required|numeric|size:10',
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
    'amount'=>$request->amount,
];

$res_updated = $database->getReference('/devotersList'.$id)->update($updateData);

if($res_updated){
    return redirect('devoters')->with('status' , 'details updated successfully');
}else{
    return redirect('devoter/{id}')->with('status' , 'details not updated');
}

}


//--------------------Delete Devotee Details---------------------------------
function delete($id){
    $firebase = (new Factory)
    ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');

$database = $firebase->createDatabase();

$deleteData = $database->getReference('/devotersList'.$id)->remove();

if($deleteData){
    return redirect('devoters')->with('status' , 'details Deleted successfully');
}else{
    return redirect('devoters')->with('status' , 'details not Delete');
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
                'amount' => 'required|numeric'
             ]);


            $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com');
        
            $database = $firebase->createDatabase();
        
         
            $postData = [
                'description' => $request->description,
                'amount'=>$request->amount,
            ];
            $postRef = $database->getReference('/expensesList')->push($postData);

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
