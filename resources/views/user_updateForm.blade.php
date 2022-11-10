<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/user-form.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

    <title>User Update form</title>
</head>
<body>
    <nav>
        <img src="/img/logo.png" alt="logo">
       <h2> User Update Form </h2>
  </nav>

  <main>


    <form action= "" method="POST">
@csrf
        <div class="form-group col-md-10">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" value="" name="name" required class="form-control" placeholder="Name" id="formGroupExampleInput" required>
            <span style="color: red">
              @error('name')
              {{$message}}
              @enderror
            </span>
          </div>
          
          <div class="form-group col-md-10 mobile" >
            <label for="inputEmail4">Mobile no.</label>
            <input type="tel" value="" pattern="[0-9]{10}" name="mobile" placeholder="Mobile no." class="form-control" id="inputEmail4" required >
            <span style="color: red">
              @error('mobile')
              {{$message}}
              @enderror
            </span>
        </div>
     
            <div class="form-group col-md-10">
              <label for="inputEmail4">Email</label>
              <input type="email" value="" name="email" class="form-control" id="inputEmail4" placeholder="Email" required>
              <span style="color: red">
                @error('email')
                {{$message}}
                @enderror
              </span>
            </div>
         

          <div class="form-group col-md-10">
            <label for="inputAddress" >Update Password</label>
            <input type="password" value="" name="password" class="form-control" id="exampleInputPassword1" required placeholder="Password">
            <span style="color: red">
              @error('password')
              {{$message}}
              @enderror
            </span>
          </div>

          <div class="form-group col-md-10">
            <label for="inputAddress">Confirm Updated Password</label>
            <input type="password" value="" name="confirmpassword" class="form-control" id="exampleInputPassword2" required placeholder="Confirm Password">
            <span style="color: red">
              @error('confirmpassword')
              {{$message}}
              @enderror
            </span>
          </div>
         
          <div class="btn btn-success" onclick="userFun('update')">Update</div>
          <a href="./users"><div class="btn btn-outline-secondary" >Cancel</div></a>


          <div class="addWrapper" id="addWrapper">
            <div class="conformMsg">
                <p>Are You Sure ?</p>
    
                <div id="editForm">
                    <div class="conformMsgBtnsDiv">     
                        <button class="btn btn-success" type="submit">Update</button> 
                        <button class="btn btn-danger cancelBtn" onclick="userFun('cancel')">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

  </main>

  <script>

    function userFun(value){
        let addWrapper = document.getElementById('addWrapper');

        if(value=='update'){
            addWrapper.style.display="flex";
        }else{
            addWrapper.style.display="none";
        }
    }
</script>

   {{-- message after performing action  --}}

   @if (session()->has('addsuccess'))
   <script >
       alert("Details Added Successfully !")
   </script>
   @endif
   @if (session()->has('addfail'))
   <script defer>
       alert("Failed To Add ! Please Try again Later")
   </script>
   @endif



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>   
</body>
</html>