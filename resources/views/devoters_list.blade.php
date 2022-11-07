<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/devoters-list.css">
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

            <div class="tableDiv">
            <table>
                <tr>
                    <th width="80px">Serial no.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th width="50px">Action</th>
                </tr>
                {{-- @foreach ($details1 as $item)
                <tr>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['address']}}</td>
                    <td>{{$item['email']}}</td>
                    <td>{{$item['mobile']}}</td>
                    <td class="amount">+ {{$item['amount']}} ₹</td>
                </tr>
                @endforeach --}}
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info" >Update</button></td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Raj Ingale</td>
                    <td>karvenagar pune</td>
                    <td>abcd@efg.com</td>
                    <td>1234567890</td>
                    <td><button class="btn btn-info">Update</button></td>
                </tr>
                

            </table>
            </div>
        </main>
    </div>
   
</body>
</html>