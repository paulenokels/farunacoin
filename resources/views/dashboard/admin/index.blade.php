@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

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
      <div class="col-md-4 col-sm-6">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Total Users</h5>
               <h6 class="card-subtitle mb-2 text-muted">Total users on platform</h6>
               <p class="card-text">{{ $counts['users'] }} </p>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-sm-6">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Total Minning Licences</h5>
               <h6 class="card-subtitle mb-2 text-muted">Total mining licences by users</h6>
               <p class="card-text">{{ $counts['mining_licences'] }}</p>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-sm-6">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Total Data Transactions</h5>
               <h6 class="card-subtitle mb-2 text-muted">Number of successful data transactions on site</h6>
               <p class="card-text">{{ $counts['data'] }}</p>
            </div>
         </div>
      </div>
      
      <div class="col-md-4 col-sm-6">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Amount in Reserve</h5>
               <h6 class="card-subtitle mb-2 text-muted">Faruna coin reserve</h6>
               <p class="card-text">{{ $counts['reserve_amount'] }}</p>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-sm-6">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Support Messages</h5>
               <h6 class="card-subtitle mb-2 text-muted">New support messages</h6>
               <p class="card-text">{{ $counts['support_messages'] }}</p>
            </div>
         </div>
      </div>
      
   </div>
</div>
</div>
@endsection
