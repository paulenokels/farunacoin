@extends('layouts.dashboard')
@section('content')
<script src="{{ asset('js/format-currency.js') }}"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Purchase Coin</h1>
  @if(session('success'))
   <div class="row">
      <div class="col-12">
         <div class="alert alert-success" ">
            <i class="fa fa-check "></i>
            {{ session('success') }}
         </div>
      </div>
    </div>
@endif
</div>

<!-- Content Row -->
<div class="row">

  <div class="card">
    <div class="card-body">
        <p>1 Faruna Coin = {{ $price }} Naira</p>
        <p>Minimum Purchase is 1 coin</p>
     
     
            <div class="form-row">
                <div class="col">
                        <p style="display:none" class="amount"></p>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input min="10" type="number" class="form-control" placeholder="Units *" value="" name="units" required>
                </div>
                <div class="col">
                   <button onClick="payWithPaystack()" class="btn btn-success proceed-btn" disabled>Proceed</button>
                </div>
            </div>
    </div>
</div>

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

        var price = parseInt('{{ $price }}');

        $('input[name="units"]').keyup(function(e) {
             units = parseFloat(e.target.value);
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
        alert("Minimum purchase is 1 coin");
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

        const url = '{{  url("dash/coin/payment/confirm") }}';
        $.ajax({
            url: url,
            data: {
            "_token": "{{ csrf_token() }}",
            "reference" : response.reference,
            "units": units,
            },
            type: 'POST',
            success: function (res) {
            //Do whatever you like
            if(typeof res !== undefined ) {
               res = JSON.parse(res);
               console.log(res);

               if (res.success) {
                
               $('.modal-body').html("<div style='text-align:center'><p class='success'><i class='fa fa-check'></i> Coin purchase was succesful. You will be redirected</p></div>");
                window.location = "{{ url('dash') }}"
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
      }
    });
    handler.openIframe();
  }
</script>

@endsection