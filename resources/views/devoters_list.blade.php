<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/devoters-list.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Devoters list</title>
</head>
<body>
    <div class="adjustSidebar">

        <header>
            @section('devoters')
            "active"
                @endsection
            @include('layouts/sidebar')
        </header>
        <main>
            <nav>
                  <img src="img/logo.png" alt="logo">
                 <h2> Devoters list</h2>
            </nav>

            <div class="addUserBtnWrapper">
                <a href="/devoters/devoter-form"><button class="btn btn-success">Add Devoter</button></a>
            </div>
            <div class="tableDiv">
            <table>
                <tr>
                    <th width="80px">Serial no.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th width="150px">Mobile</th>
                    <th width="120px">Action</th>
                </tr>

                @php
                    $Serialno = 1;
                @endphp

                @if ($details1 != null)
                @foreach ($details1 as $id=>$item)
                <tr>
                    <td>
                       {{$Serialno++;}}
                    </td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['address']}}</td>
                    <td>{{$item['email']}}</td>
                    <td>{{$item['mobile']}}</td>
                    <td>
                       
                        <a href="/devoter/{{$id}}"><button class="btn editBtn" ><i class="fa fa-edit"></i></button></a>
                        
                       <a href="/devoter-delete/{{$id}}" ><button class="btn deleteBtn"><i class="fa fa-trash"></i></button></a> 
                    </td>
                </tr>
                @endforeach
                @else
                    <tr ><td colspan="6" style="text-align: center;font-size: 20px">
                        No Data to show
                    </td> </tr>
                @endif
                
            </table>
            </div>
        </main>
    </div>

   {{-- message after performing action  --}}

   @if (session()->has('updatesuccess'))
   <script >
       alert("Details Updated Successfully !")
   </script>
   @endif
   @if (session()->has('updatefail'))
   <script defer>
       alert("Failed To Update ! Please Try again Later")
   </script>
   @endif
   @if (session()->has('deletesuccess'))
   <script >
       alert("Deleted Successfully !")
   </script>
   @endif
   @if (session()->has('deletefail'))
   <script defer>
       alert("Failed To Delete ! Please Try again Later")
   </script>
   @endif
</body>
</html>