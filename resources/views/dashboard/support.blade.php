@extends('layouts.dashboard')

@section('content')
<div class="col-12 leftmothercol formwrapper">
    <div class="row">
        <div class="col-12">
            <h4 class="staticpagesheader">CONTACT SUPPORT</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

            @if(count($errors))
                             <div class="row">
                                    <div class="col-6 col-sm-12 mx-auto">

                                        <div class="error" style="text-align:center; margin-bottom: 10px">
                                            <ul class="list-group error">
                                                @foreach($errors->all() as $error)
                                                    <li class="list-group-item error">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif

                @if(session('success'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success" ">
                            <i class="fa fa-check "></i>
                            {{ session('success') }}
                        </div>
                    </div>
                    </div>
                @else
                <form method="POST" action="{{ url('dash/support') }}" enctype="multipart/form-data">
                <input value="{{ Auth::user()->full_name }}" type="hidden" name="name" >
                <input value="{{ Auth::user()->email }}" type="hidden" name="email" >
                <input value="{{ Auth::user()->phone_number }}" type="hidden" name="phone_number" >

                @csrf
                            
            
               <div class="form-group">
                    <label for="exampleInputEmail1">Your Message <span class="required">*</span></label>
                  <textarea value="{{ old('message') }}" name="message" required rows="5" class="form-control"></textarea>
               </div>
               <div class="form-group">
                    <label for="exampleInputEmail1">Attach file (If Any)</label>
                    <input  type="file" name="attachment" class="form-control" >
               </div>
               <div class="form-row" style="margin-top: 10px">
                  <button type="submit" class="btn btn-success btn-lg">Send</button>
               </div>
            </form>

                @endif


                          

            
            <hr>
          
            <h5>More ways to connect</h5>
            <p>
                <i class="fa fa-phone-alt"></i> 
                 Phone : <a href="tel:8134086523">+2348134086523</a>
            </p>

          
            <p>
                <i class="fa fa-whatsapp"></i> 
                 WhatsApp : <a href="https://wa.me/2348134086523" target="_blank"> (+234)8134086523 </a>
            </p>
            
          
        </div>
    </div>
    </div>
    </div>
</div>

@endsection