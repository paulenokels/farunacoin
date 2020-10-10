@extends('layouts.dashboard')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Transfer Coin</h1>
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
<div class="col">

  <div class="card">
    <div class="card-body">
        
        <h6 class="heading">Wallet Balance = {{ Auth::user()->coin_balance }} FAC </h6>
        <form method="POST" action="{{ url('dash/coin/transfer') }}" class="transfer-form">
        @csrf
            
            <div class="form-row">
                <div class="col-md-6">
                    <input class="form-control" placeholder="Enter Wallet Address" value="{{ old('receiver_address') }}" name="receiver_address" required>
                </div>
                
            </div>

            <p style="padding: 10px; color: orange">Faruna coin wallet address is a 32 digit number beginning with "9F" </p>
            <p style="padding: 10px; color: red">NOTE: All transfers attract network fee of 3% </p>
                
            <div class="form-row">
                <div class="col-md-6">
                    <input  type="number" step="any" class="form-control" placeholder="Amount *" value="{{ old('amount') }}" name="amount" required>
                </div>
            </div>

            <div class="form-row" style="margin-top: 20px">
                <div class="col-md-12">
                   <input type="submit" value="Transfer" class="btn btn-success transfer-btn" >
                </div>
            </div>

            <p class="progress" style="display:none">Transaction in progress please wait...</p>


        </form>
           
    </div>
</div>
</div>

</div>




</div>
<!-- /.container-fluid -->

<script>
      

    $(document).ready(function() {
      $('form.transfer-form').on("submit", function(e) {
        $('input.transfer-btn').hide();

        $('p.progress').show('fast');
      });
    });
  
</script>

@endsection