@extends('layouts.dashboard')
@section('content')
<script src="{{ asset('js/format-currency.js') }}"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>

<style>

.pricing .card {
    border: none;
    border-radius: 1rem;
    transition: all 0.2s;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1) !important;
    cursor: pointer;
  }
  
  .pricing hr {
    margin: 1.5rem 0;
  }
  
  .pricing .card-title {
    margin: 0.5rem 0;
    font-size: 0.9rem;
    font-weight: bold;
  }
  
  .pricing .card-price {
    font-size: 1.6rem;
    margin: 0;
  }
  
  .pricing .card-price .period {
    font-size: 0.8rem;
  }
  
  .pricing ul li {
    margin-bottom: 1rem;
  }
  
  
  
  .pricing .btn {
    font-size: 80%;
    border-radius: 5rem;
    letter-spacing: .1rem;
    font-weight: bold;
    padding: 1rem;
    opacity: 0.7;
    transition: all 0.2s;
  }
@media only screen and (max-width: 578px) {

    section.pricing {
      margin-top: 350% !important;
      
    }
  
} 

</style>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Purchase Mobile Data</h1>
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


<div class="row" style="margin-bottom: 15px">
    <div class="col-12">

        <p>Enter the phone number and select a data bundle below </p>
    </div>  
    <div class="col-6">
        <input min="10" type="number" class="form-control" placeholder="Enter Phone number" value="{{ Auth::user()->phone_number }}" name="phone_number" required>
    </div>
    
</div>
<div class="row">

      
<!-- Pricing Column -->
    <div class="pricing col-md-3 col-lg-3 col-sm-4">
        <div class="card mb-5 mb-lg-0">
            <div class="card-body">
                <p class="text-center">
                <img src="{{ asset('img/mtn-logo.jpg') }}" width="150" height="100" />

                </p>
                <h5 class="card-title text-muted text-uppercase text-center">1 GB</h5>
                <h6 class="card-price text-center">N530</h6>
                <hr />
               
                <p class="btn btn-block btn-primary text-uppercase" data-price="530" data-network-code="01" data-plan-size="1000">Purchase</p>
            </div>
        </div>
</div>
<!-- /.Pricing Column -->


<!-- Pricing Column -->
    <div class="pricing col-md-3 col-lg-3 col-sm-4">
        <div class="card mb-5 mb-lg-0">
            <div class="card-body">
                <p class="text-center">
                <img src="{{ asset('img/mtn-logo.jpg') }}" width="150" height="100" />

                </p>
                <h5 class="card-title text-muted text-uppercase text-center">2 GB</h5>
                <h6 class="card-price text-center">N850</h6>
                <hr />
               
                <p class="btn btn-block btn-primary text-uppercase" data-price="850" data-network-code="01" data-plan-size="2000">Purchase</p>
            </div>
        </div>
    </div>
<!-- /.Pricing Column -->


<!-- Pricing Column -->
    <div class="pricing col-md-3 col-lg-3 col-sm-4">
        <div class="card mb-5 mb-lg-0">
            <div class="card-body">
                <p class="text-center">
                <img src="{{ asset('img/mtn-logo.jpg') }}" width="150" height="100" />

                </p>
                <h5 class="card-title text-muted text-uppercase text-center">5 GB</h5>
                <h6 class="card-price text-center">N1,785</h6>
                <hr />
               
                <p class="btn btn-block btn-primary text-uppercase" data-price="1785" data-network-code="01" data-plan-size="5000">Purchase</p>
            </div>
        </div>
    </div>
<!-- /.Pricing Column -->



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
        var phoneNumber = "";
        var networkCode = "01";
        var planSize =  0;


    $(document).ready(function() {

        $('.pricing .btn').on("click", function() {
             amount = $(this).attr('data-price');
             networkCode = $(this).attr('data-network-code');
             planSize = $(this).attr('data-plan-size');
             phoneNumber = $('input[name=phone_number').val();
             if (!phoneNumber) {
                 alert("Please provide a phone number");
                 return;
             }
             payWithPaystack();
        });

      
    });
  function payWithPaystack(){
    
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

        const url = '{{  url("dash/data/payment/confirm") }}';
        $.ajax({
            url: url,
            data: {
            "_token": "{{ csrf_token() }}",
            "reference" : response.reference,
            "phone_number": phoneNumber,
            "network_code": networkCode,
            "plan_size": planSize,
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