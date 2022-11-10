<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/donation-list.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">


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

            @php
            $Serialno = 1;
            $totalAmount=0;
            // to calculate the total amount-----------------------
            foreach ($details2 as $item) {
                $totalAmount = $item['amount']+$totalAmount;
            };
        @endphp
            <div class="totalAmountDiv">
                <p class="totalAmountHeading">Total Amount Recived :</p>
                <p class="totalAmount">{{$totalAmount}} ₹</p>
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

                    @if ($details2 != null)
                    @foreach ($details2 as $item)
                    <tr>
                        <td>{{$Serialno++;}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['address']}}</td>
                        <td>{{$item['mobile']}}</td>
                        <td>{{$item['mobile']}}</td>
                        <td class="amount">+ {{$item['amount']}} ₹</td>
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

   </body>
</html>