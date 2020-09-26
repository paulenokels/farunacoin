@extends('layouts.admin')
@section('content')
<script src="{{ asset('js/format-currency.js') }}"></script>


<style>
    tr.tr td {
        font-size: 12px;
        font-weight: bold;
    }

    
</style>

  

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data purchase History</h1>
  @if(session('success'))
   <div class="row">
      <div class="col-12">
         <div class="alert alert-success" ">
            <i class="fa fa-check "></i>
            {{ session('success') }}
         </div>
      </div>
    </div>
    @elseif(session('error'))
    <div class="row">
      <div class="col-12">
         <div class="alert alert-danger" ">
            <i class="fa fa-times "></i>
            {{ session('error') }}
         </div>
      </div>
    </div>
@endif
</div>

<!-- Content Row -->
<div class="row">

   @if ($transactions->count())
   <div class="table-responsive">
        <table class="table">
            <thead class="thead">
                <tr>
                <th scope="col">Network</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
               
                </tr>
            </thead>

            @foreach($transactions as $transaction)
                <tr  class="tr {{ $transaction->sender_address == Auth::user()->fac_wallet_address ? 'table-danger' : 'table-success'}}">
                    <td>{{ $transaction->network }}</td>
                    <td>{{ $transaction->phone_number }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ date_format($transaction->created_at, 'd M Y') }}</td>
                </tr>

            @endforeach
        </table>
    </div>


   @else
        <h5>No transaction history to show</h5>
   @endif

</div>

</div>
<!-- /.container-fluid -->



@endsection