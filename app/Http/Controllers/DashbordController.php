<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use \Kreait\Firebase\Exception\Auth\InvalidPassword;
use Auth;

class DashbordController extends Controller
{
    //--------------------------to desplay the dashbord after login--------------------------
    public function index()
    {
       
      return view('dashboard_home');
    }

//-----------------------------Getting Devoters list---------------------------------------
    public function devoter(){
        $firebase = (new Factory)
        ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
        ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/devotersList');

    $database = $firebase->createDatabase();

    $details = $database->getReference('/');
    // $details=$details->getvalue();

     $details=$details->getvalue() ;
     return view('devoters_list', ['details1'=>$details]);
    }


//------------------------------Save Devoter-----------------------------------
    function addDevoter(Request $request){
      
        $this->validate($request , [
            'name' => 'required|string',
            'email'  => 'required|email',
            'mobile' => 'required|numeric|size:10',
            'address' => 'required|string'
         ]);


        $firebase = (new Factory)
        ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
        ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/devotersList');

    $database = $firebase->createDatabase();

    $details = $database->getReference('/');

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
    
    $saveRef = $database->getReference('/')->push($saveData);

    if($saveRef){
        return redirect('devoters/devoter-form')->with('status','added successfully');

    }else{
        return redirect('devoters/devoter-form')->with('status','Not added'); 
    }

    }






    //---------------------Update Devotee Details--------------------------------
function update($id){

    $key = $id;
    $firebase = (new Factory)
    ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/devotersList');

$database = $firebase->createDatabase();

$editData = $database->getReference('/')->getchild($key)->getvalue();

if($editData){
    return view('testUpdate' , compact('editData','key'));
}
else{
    return redirect('testUpdate')->with('status','user not found');
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
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/devotersList');

$database = $firebase->createDatabase();

$updateData = [
    'name' => $request->name,
    'address' => $request->address,
    'mobile' => $request->mobile,
    'email' => $request->email,
];

$res_updated = $database->getReference("/$key")->update($updateData);

if($res_updated){
    return redirect('/devoters')->with('status' , 'details updated successfully');
}else{
    return redirect('/devoters')->with('status' , 'details not updated');
}

}


//--------------------Delete Devotee Details---------------------------------
function delete($id){
    $firebase = (new Factory)
    ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
    ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/devotersList');

$database = $firebase->createDatabase();
$key = $id;
$deleteData = $database->getReference("/$key")->remove();

if($deleteData){
    return redirect('/devoters')->with('status' , 'details Deleted successfully');
}else{
    return redirect('/devoters')->with('status' , 'details not Delete');
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
         
         return view('expenses_list' , ['details1'=> $details ]);

        }


      
      
        //-----------------to add and show message after successfully add expense-------------
        function expenseAdd(Request $request){

            $this->validate($request , [
                'description' => 'required|string',
                'amount' => 'required|numeric'
             ]);


            $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/donationdata-firebase-adminsdk-a0irl-e3ce4e4306.json')
            ->withDatabaseUri('https://donationdata-default-rtdb.firebaseio.com/expensesList');
        
            $database = $firebase->createDatabase();
        
           
            $postData = [
                'description' => $request->description,
                'amount'=>$request->amount,
            ];
            $postRef = $database->getReference('/')->push($postData);

            if($postRef){
                return redirect('expenses')->with('status','added successfully');

            }else{
                return redirect('expenses')->with('status','Not added'); 
            }
         
        }
 
}
