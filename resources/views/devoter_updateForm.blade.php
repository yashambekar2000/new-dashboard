<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/devoter-form.css">
    <title>Devoter form</title>
</head>
<body>
    <nav>
        <img src="../img/logo.png" alt="logo">
       <h2> Devoter Form </h2>
  </nav>

  <main>


    <form action= "/devoters/devoter-update/{{$id}}" method="POST">
        @csrf
        <div class="form-group col-md-10">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" name="name" required class="form-control" placeholder="Name" id="formGroupExampleInput" value="{{$editData['name']}}">
          </div>
          <span>
            @error('name')
            {{$message}}
            @enderror
          </span>


          <div class="form-row">
            <div class="form-group col-md-5">
              <label for="inputEmail4">Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{$editData['email']}}">
            </div>
            <div class="form-group col-md-4 mobile" >
                <label for="inputEmail4">Mobile no.</label>
                <input type="number" name="mobile" placeholder="Mobile no." class="form-control" id="inputEmail4" required value="{{$editData['mobile']}}">
            </div>
          </div>
          <span>
            @error('email')
            {{$message}}
            @enderror
          </span>
          <span>
            @error('mobile')
            {{$message}}
            @enderror
          </span>

          <div class="form-group col-md-10">
            <label for="inputAddress">Address</label>
            <input type="text" name="address" placeholder="Address" class="form-control" id="inputAddress" value="{{$editData['address']}}">
          </div>
          <span>
            @error('address')
            {{$message}}
            @enderror
          </span>

          <div class="btn btn-success" onclick="conformAddExpense('add')">Update</div>
          <a href="../devoters"><div class="btn btn-outline-secondary">Cancel</div></a>


          <div class="conformMsgWrapper" id="conformMsgWrapper">
              <div class="conformMsg">
                  <p>Are you Sure ?</p>
                  <div class="conformMsgBtnsDiv">     
                     <button class="btn btn-success" type="submit">Update</button> 

                     <div class="btn btn-danger" onclick="conformAddExpense('cancel')">Cancel</div>
                  </div>
              </div>
          </div>
    </form>

  </main>

  <script>
    function conformAddExpense(value){
        let conformMsg = document.getElementById('conformMsgWrapper');
        
        if(value == 'add' ){
            conformMsg.style.display="flex";
        }
        else{
            conformMsg.style.display="none";
        }
    }
</script>
    
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>   
</body>
</html>