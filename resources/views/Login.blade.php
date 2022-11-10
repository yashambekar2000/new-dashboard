<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <!-- Font Styles-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Merriweather+Sans:ital@1&family=Playfair+Display:wght@900&family=Roboto+Condensed:ital,wght@1,700&display=swap" rel="stylesheet">
   
   
   <style>

*{
    margin: 0px;
    padding: 0px;
    font-family:  'Playfair Display', serif;
}

nav{
    display: flex;
    flex-direction: row;
    height: 80px;
    background-color: #7DE5ED;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
}
nav>p{
    font-size: 40px;
    color: white;
    font-weight:400;
    /* border-bottom: 6px double white; */
}
nav>img{
    width: 80px;
}


body{
background-image: url('img/background.jpg');
background-repeat:no-repeat;
background-size:cover;
background-attachment:fixed;
/* background-color:#8D72E1; */
}

form {
  border: 6px solid #7DE5ED;
}

label{
    font-size:40px;
    font-weight:700;
    color:#7DE5ED;
}
/* Full-width inputs */
input[type=email], input[type=password] {
  width: 70%;
  height: 60%;
  font-size:30px;
  padding: 12px 20px;
  margin: 12px 0;
  display: inline-block;
  border: 1px solid orange;
  box-sizing: border-box;
  opacity: 0.6;
}

/* Set a style for all buttons */
.login__submit {
  background-color: #7DE5ED;
  border: 3px solid #7DE5ED ;
  color: white;
  padding: 14px 20px;
  margin: 6px 0;
  cursor: pointer;
  font-size:25px;
  font-weight:700;
    margin-left:30%;
	padding: 16px 20px;
	border-radius: 26px;
	text-transform: uppercase;
	display: flex;
	align-items: center;
	width: 40%;
	box-shadow: 0px 2px 2px #5C5696;
	transition: .2s;

}



/* Add a hover effect for buttons */

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
    opacity: 0.7;
	border-color: #6A679E;
	outline: none;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: white;
}


.log{
    width:60%;
   height:120%;
    text-align:center;
    justify-content:center;
    margin-top:12%;
    margin-left:20%;
font-size:xx-large;
    /* border-radius:10px; */
    box-shadow: 10px 17px 17px -9px rgba(0,0,0,0.75);
    /* display: block; */
}

@media(max-width:800px) {
 
 body{
  align-items:center;
  font-size:10px;
 }


 input[type=email], input[type=password] {
  width: 100%;
 }

 nav{
        padding: 5px;
    }

 .log{
  margin-top:20%;
    margin-left:0%;
width:100%;
   height:100%;
}
}

 </style>


</head>


<body>


<nav>
        <img src="img/logo.png" alt="logo">
        <p>Admin Login</p>
        <img src="img/logo.png" alt="logo">
    </nav>






<div class="log">

<!-- <script>
if(session('status')=="true"){
window.alert("Login First");
}
</script> -->

@if($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button class="close" type="button" data-dismiss="alert">X</button>
    <strong>{{$message}}</strong>
</div>
@endif

@if (count($errors)>0)

<div class="alert alert-danger">
    <ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif

@if(session('status'))
<h2 class="alert alert-danger">{{session('status')}}</h2>
@endif
<form method="post" action="/">
    {{csrf_field() }}
    <div class="username">
<label for="email">Username :</label>
<!-- <i class="login__icon fas fa-user"></i> -->
<input type="email" name="email" placeholder="Username/Email">
</div>

<div class="pass">
<label for="password">Password :</label>
<input type="password" name="password" placeholder="Password">
</div>
<button class="button login__submit">
<span class="button__text">Log In</span>
<i class="button__icon fas fa-chevron-right"></i>
</button>	
</form>
</div>





</body>
</html>


