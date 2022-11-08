<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/user-management.css">

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

        </main>
    </div>
   
   </body>
</html>