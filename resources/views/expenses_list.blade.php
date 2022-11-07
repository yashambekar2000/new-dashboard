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

            <form class="addExpense">
                <input type="text" required placeholder="Expense Description" class="form-control form-control-lg">
                <input class="form-control" required type="number" placeholder="Amount ₹">
                <button type="submit" class="btn btn-success">Add Expense</button>
                <button type="reset" class="btn btn-outline-secondary">Clear</button>
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
   
   </body>
</html>