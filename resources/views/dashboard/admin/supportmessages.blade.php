@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<script src="{{ asset('js/format-currency.js') }}"></script>


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


<div class="section-content">
<div class="row">
        <div class="col-6 section-title">
             Support Messages
        </div>
       
</div>
    <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    @if(count($messages) > 0)
                    @foreach($messages as $message)
                        <div class="row">
                            <div class="col-12">
                            <b>{{ $message->name }}</b>
                            <p>{{ $message->phone_number }}</p>
                            <p>{{ $message->email }}</p>
                            @if($message->attachment)
                            <a href="{{ asset($message->attachment) }}" target="_blank">View attachment</a>
                            @endif
                            <p>{{ $message->message }}</p>
</div>

                        </div>
                        <hr>
                    @endforeach
                    <div>
                        {{ $messages->links()}}
</div>
                   
@else
<div class="col-12 mx-auto" style="text-align: center">
                  <p>No Support messages</p>
                  
               </div>
@endif
                    </div>
                </div>
        </div>
        
    </div>
   
</div>




<script type="text/javascript">
$(document).ready(function() {
  
});


</script>
</div>

@endsection