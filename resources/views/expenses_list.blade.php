<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/expenses-list.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">


    <title>Expenses</title>
</head>
<body>
    <div class="adjustSidebar">

        <header>
            @section('expenses')
            "active"
            @endsection
            @include('layouts/sidebar')
        </header>
        <main>
            <nav >
                    <img src="img/logo.png" alt="logo">
                     <h2>Expenses list</h2>
            </nav>

            @php
            $Serialno = 1;
            $totalAmount=0;
            // to calculate the total amount-----------------------
            foreach ($details1 as $item) {
                $totalAmount = $item['amount']+$totalAmount;
            };
        @endphp

            <div class="expensesTotal">
                    <p>Expenses Total :</p>
                    <p class="totalAmount">{{$totalAmount}} ₹</p>
            </div>

            <form class="addExpense" action="/expenses" method="post">
                {{csrf_field()}}
                <input type="text" name="description" required class="form-control form-control-lg" placeholder="Expense Description">
                <span style="color: red">
                    @error('description')
                    {{$message}}
                    @enderror
                  </span>

                <input class="form-control" name="amount" min="1" id="addAmount" required type="number" placeholder="Amount ₹">
                <span style="color: red">
                    @error('amount')
                    {{$message}}
                    @enderror
                  </span>

                <div class="btn btn-success" onclick="conformAddExpense('add')">Add Expense</div>
                <button type="reset" class="btn btn-outline-secondary">Clear</button>

                <div class="conformMsgWrapper" id="conformMsgWrapper">
                    <div class="conformMsg">
                        <p>Are you Sure ?</p>
                        <div class="conformMsgBtnsDiv">     
                           <button class="btn btn-success" type="submit">Add Expense</button> 
                           <div class="btn btn-danger cancelBtn"  onclick="conformAddExpense('cancel')">Cancel</div>
                        </div>
                    </div>
                </div>

            </form>


            <div class="tableDiv">

                <table>
                    <tr>
                        <th width="80px">Serial no.</th>
                        <th width="140px">Date</th>
                        <th>Expense Description</th>
                        <th width="120px">Amount</th>
                    </tr>

                    @php
                    $Serialno = 1;
                @endphp

                @if ($details1 != null)
                @foreach( $details1 as $item )
                    <tr>
                        <td>{{$Serialno++;}}</td>
                        <td>{{ $item['date'] }}</td>
                        <td>{{ $item['description'] }}</td>
                        <td class="amount">{{ $item['amount'] }} ₹</td>
                    </tr>
                    @endforeach
                    @else
                        <tr ><td colspan="6" style="text-align: center;font-size: 20px">
                            No Data to show
                        </td> </tr>
                    @endif
                </table>
        </main>
    </div>
   
    {{-- message after performing action  --}}

   @if (session()->has('expensesuccess'))
   <script >
       alert("Expense Added Successfully !")
   </script>
   @endif
   @if (session()->has('expensefail'))
   <script defer>
       alert("Failed To Add Expense ! Please Try again Later")
   </script>
   @endif

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
   </body>
</html>