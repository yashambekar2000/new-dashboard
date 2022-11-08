<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/expenses-list.css">

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

            <div class="expensesTotal">
                    <p>Expenses Total :</p>
                    <p class="totalAmount">12000 ₹</p>
            </div>

            <form class="addExpense" action="/expenses" method="post">
                {{csrf_field()}}
                <input type="text" name="description" required class="form-control form-control-lg" placeholder="Expense Description">
                <span>
                    @error('description')
                    {{$message}}
                    @enderror
                  </span>

                <input class="form-control" name="amount" id="addAmount" required type="number" placeholder="Amount ₹">
                <span>
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
                           <button class="btn btn-success" type="submit">Add</button> 
                           <div class="btn btn-danger" onclick="conformAddExpense('cancel')">Cancel</div>
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
                        <td>11-nov-2022</td>
                        <td>Raj Ingale</td>
                        <td class="amount">501 ₹</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>11-nov-2022</td>
                        <td>Raj Ingale</td>
                        <td class="amount">501 ₹</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>11-nov-2022</td>
                        <td>Raj Ingale</td>
                        <td class="amount">501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>11-nov-2022</td>
                        <td>Raj Ingale</td>
                        <td class="amount">501 ₹</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>11-nov-2022</td>
                        <td>Raj Ingale</td>
                        <td class="amount">501 ₹</td>
                    </tr>
                
                </table>
        </main>
    </div>
   
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