<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/dashboard-home.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>DashBoard</title>
</head>
<body>
    
    <div class="adjustSidebar">

        <header>
            @include('layouts/sidebar')
        </header>
        <main>
            @section('heading')
            DashBoard
            @endsection
            @include('layouts/navbar')
           

            <div class="imageContainer">
                <img src="img/logo.png" alt="logo">
                <p>धर्मगुरू श्री. श्री. फरांडे महाराज मठ संस्थान </p>
            </div>
        </main>
    </div>
</body>
</html>