<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/user-management.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>User Management</title>
</head>
<body>
    <div class="adjustSidebar">

        <header>
            @section('users')
            "active"
            @endsection
            @include('layouts/sidebar')
        </header>
        <main>
            <nav >
                    <img src="img/logo.png" alt="logo">
                     <h2>User Management</h2>
            </nav>

            <div class="addUserBtnWrapper">
                <a href="/adduser"><button class="btn btn-success">Add User</button></a>
            </div>
            <div class="tableDiv">
                <table>
                    <tr>
                        <th width="80px">Serial no.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="150px">Mobile</th>
                        <th width="120px">Action</th>
                    </tr>
    
                    @php
                        $Serialno = 1;
                    @endphp
    
                    {{-- @if ($details1 != null) --}}
                    {{-- @foreach ($details1 as $id=>$item) --}}
                    <tr>
                        <td>
                           1
                        </td>
                        <td>raj</td>
                        <td>raj@moxiedeck.com</td>
                        <td>1234567890</td>
                        <td>

                            <div class="btn editBtn" onclick="userFun('edit')"><i class="fa fa-edit"></i></div>
                            
                            <div class="btn deleteBtn" onclick="userFun('delete')"><i class="fa fa-trash"></i></div>
                           
                            {{-- <a href="/devoter/{{$id}}"><button class="btn editBtn" ><i class="fa fa-edit"></i></button></a> --}}
                            
                           {{-- <button class="btn deleteBtn" onclick="conformDelete('delete','{{$id}}')" value="{{$id}}"><i class="fa fa-trash"></i></button> --}}
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                    {{-- @else --}}
                        {{-- <tr ><td colspan="6" style="text-align: center;font-size: 20px">
                            No Data to show
                        </td> </tr> --}}
                    {{-- @endif --}}
                    </table>
                        </div>


                    <div class="deleteWrapper" id="deleteWrapper">
                        <div class="conformMsg" >
                            <p>Enter Admin Password</p>
                            <form action="" id="deleteForm">
                                <input type="password" class="form-control" id="exampleInputPassword1" required placeholder="Admin Password">
                                <div class="conformMsgBtnsDiv">     
                                    <button class="btn btn-success" type="submit">Delete the User</button>
                                   <button class="btn btn-danger cancelBtn"  type="reset" onclick="userFun('cancel')">Cancel</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    <div class="editWrapper" id="editWrapper">
                        <div class="conformMsg">
                            <p>Enter Admin Password</p>
                             
                            <form action="" id="editForm">
                                <input type="password" class="form-control" id="exampleInputPassword1" required placeholder="Admin Password">
                                <div class="conformMsgBtnsDiv">     
                                    <button class="btn btn-success" type="submit">Edit the User</button>
                                   <button class="btn btn-danger cancelBtn" type="reset" onclick="userFun('cancel')">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
    
        </main>

    </div>
   
    <script>

        function userFun(value){
            let deleteWrapper = document.getElementById('deleteWrapper');
            let editWrapper = document.getElementById('editWrapper');
            let editForm = document.getElementById('editForm');
            let deleteForm = document.getElementById('deleteForm');

            if(value=='edit'){
                editWrapper.style.display="flex";
                deleteWrapper.style.display="none";
                editForm.action='/dashboard';
            }else if(value=='delete'){
                deleteWrapper.style.display="flex";
                editWrapper.style.display="none"
                deleteForm.action='/dashboard'
            }else{
                deleteWrapper.style.display="none";
                editWrapper.style.display="none"
            }
        }
    </script>
   </body>
</html>