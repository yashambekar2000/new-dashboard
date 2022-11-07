<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/donation-list.css">

    <title>Donation Recived</title>
</head>
<body>
    <div class="adjustSidebar">

        <header>
            @section('donations')
            "active"
            @endsection
            @include('layouts/sidebar')
        </header>
        <main>
            <nav>
                    <img src="img/logo.png" alt="logo">
                   <h2> Donations list</h2>
            </nav>

            <div class="totalAmountDiv">
                <p class="totalAmountHeading">Total Amount Recived :</p>
                <p class="totalAmount">1001 ₹</p>
            </div>

            <div class="tableDiv">

                <table>
                    <tr>
                        <th width="80px">Serial no.</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Mobile</th>
                        <th>Amount</th>
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
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Raj Ingale</td>
                        <td>karvenagar pune</td>
                        <td>11-nov-2022</td>
                        <td>1234567890</td>
                        <td class="amount">+ 501 ₹</td>
                    </tr>
                
                </table>
                </div>
        </main>
    </div>

   </body>
</html>