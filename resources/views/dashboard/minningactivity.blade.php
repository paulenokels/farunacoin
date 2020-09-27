@extends('layouts.dashboard')
@section('content')
<script src="{{ asset('js/format-currency.js') }}"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>


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
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-0 text-gray-800">Minning Activity</h1>
            <p class="alert alert-danger">You have {{ $miningAccount->count() }} mining licences</p>
        </div> 
    </div>
</div>

  <div class="row">
      <div class="col-12">
         <div class="alert alert-success" >
            Welcome to Faruna coin mining. With a mining licence you get 0.33 Faruna coin daily. The cost of a mining licence is $20. The licence
   is valid for 3 months after which renewal cost is $10. NOTE: There is no limit to the number of licences you can purchase.
         </div>
      </div>
    </div>

  @if(session('success'))
   <div class="row">
      <div class="col-12">
         <div class="alert alert-success" >
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

<!-- Content Row -->
<div class="row">

<div class="col-md-6">
  <div class="card">
    <div class="card-body">
        <p>1 Minning Licence = {{ $licencePrice }} Naira</p>
     
     
            <div class="form-row">
                <div class="col">
                        <p style="display:none" class="amount"></p>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input min="1" type="number" class="form-control" placeholder="Number of Licences *" value="" name="licences" required>
                </div>
                <div class="col">
                   <button onClick="payWithPaystack()" class="btn btn-success proceed-btn" disabled>Proceed</button>
                </div>
            </div>
    </div>
</div>
</div>

</div>


<!-- Content Row -->
<div class="row">

   @if ($transactions->count())
   <div class="table-responsive">
        <table class="table">
            <thead class="thead">
                <tr>
                <th scope="col">Amount</th>
                <th scope="col">Channel</th>
                <th scope="col">Date</th>
                </tr>
            </thead>

            @foreach($transactions as $transaction)
                <tr  class="tr table-success">
                    <td>{{ $transaction->fac_amount }} FAC</td>
                    <td>{{ $transaction->channel }}</td>
                    <td>{{ date_format($transaction->created_at, 'd M Y') }}</td>
                </tr>

            @endforeach
        </table>
    </div>


   @else
        <h5>No Mining activity to show</h5>
   @endif

</div>

</div>
<!-- /.container-fluid -->

<!-- Confirming Modal -->
<div class="modal fade" id="confirmingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div style='text-align:center'>
        <img src="{{ asset('images/loading.gif') }}" />
        <p>Confirming payment</p>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
        var amount = 0;
        var units = 0;


    $(document).ready(function() {

        var price = parseInt('{{ $licencePrice }}');

        $('input[name="licences"]').keyup(function(e) {
             units = parseInt(e.target.value);
            
             amount = price * units;
            if (units > 0) {
                $('p.amount').html('Amount to pay = <span class=price>'+formatCurrency(amount)+'</span>').show();
                $('button.proceed-btn').removeAttr('disabled');
            }
            else {
                $('p.amount').hide();
                $('button.proceed-btn').attr('disabled', 'disabled');

            }
        })
    });
  function payWithPaystack(){
    if (units < 1) {
        alert("Minimum Number of Licences is 1.");
        return;
        }
    //console.log("units "+units);
    var handler = PaystackPop.setup({
      key: 'pk_live_97944b5500b4fa5de6f5d8ba255432c4e2c7f648',
      email: '{{ Auth::user()->email }}',
      amount:  amount * 100,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: '{{ Auth::user()->first_name }}',
      lastname: '{{ Auth::user()->last_name }}',
      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "{{ Auth::user()->phone_number }}"
            }
         ]
      },
      callback: function(response){
     $('#confirmingModal').modal('show');

        const url = '{{  url("dash/minning/licence/payment/confirm") }}';
        $.ajax({
            url: url,
            data: {
            "_token": "{{ csrf_token() }}",
            "reference" : response.reference,
            "licences": units,
            },
            type: 'POST',
            success: function (res) {
            //Do whatever you like
            if(typeof res !== undefined ) {
               res = JSON.parse(res);
               console.log(res);

               if (res.success) {
                
               $('.modal-body').html("<div style='text-align:center'><p class='success'><i class='fa fa-check'></i> Minning Licence purchase was succesful. You will be redirected</p></div>");
                window.location = "{{ url('dash/minning/activity') }}"
               }
               else {
               $('.modal-body').html("<div style='text-align:center'><p class='error'>"+res.msg+"</p></div>");

               }
            }
            else {
               $('.modal-body').html("<div style='text-align:center'><p class='error'>Network Error. check your connection and try again, if you have already been debited, <a href='{{ url('support') }}'>please contact support</a></p></div>");
               $('button.close-btn').show();
               
            }
            },
            error: function(error) {
                console.log(error);
            }
        });
        },
      onClose: function(){
          //window clsoed
          console.log("window closed");
          return;
      }
    });
    handler.openIframe();
  }
</script>
@endsection