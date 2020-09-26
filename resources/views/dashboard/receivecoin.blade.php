@extends('layouts.dashboard')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Receive Coins</h1>
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


<div class="row copied-alert" style="display:none">
      <div class="col-12">
         <div class="alert alert-success" ">
            <i class="fa fa-check "></i>
            Address copied to clipboard
         </div>
      </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
<div class="col">

  <div class="card">
    <div class="card-body">
        
    <p>Please copy your wallet address below.</p>
        
            <div class="form-row">
                <div class="col">
                    <input class="form-control"  value="{{ Auth::user()->fac_wallet_address }}" id="wallet-address" name="wallet_address" disabled>
                </div>
                <div class="col">
                   <button onClick="copyToClipBoard();" class="btn btn-success transfer-btn" >Copy Address</button>
                </div>
                
            </div>

       
           
    </div>
</div>
</div>

</div>




</div>
<!-- /.container-fluid -->

<script>
      

    $(document).ready(function() {
     
    });
  
  function copyToClipBoard() {
    var copyText = document.getElementById("wallet-address");

    var input = document.createElement('input');
    input.setAttribute('value', copyText.value);
    document.body.appendChild(input);
    input.select();
    var result = document.execCommand('copy');
    document.body.removeChild(input);
        /* Alert the copied text */
    $('.copied-alert').show('fast')
  }
</script>

@endsection