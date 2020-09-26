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
  <h1 class="h3 mb-0 text-gray-800">Faruna Coin Miners</h1>
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

   @if ($miners->count())
   <div class="table-responsive">
        <table class="table">
            <thead class="thead">
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Licence Type</th>
                <th scope="col">Status</th>
                <th scope="col">Expiry Date</th>
             
                </tr>
            </thead>

            @foreach($miners as $miner)
                <tr  class="tr {{ $miner->status == 'ACTIVE' ? 'table-success' : 'table-danger'}}">
                    <td>{{ $miner->full_name }}</td>
                    <td>{{ $miner->licence_type }}</td>
                    <td>{{ $miner->status }}</td>
                    <td>{{ $miner->expiry_date }}</td>
                  
                </tr>

            @endforeach
        </table>
    </div>


   @else
        <h5>No Miners on platform yet.</h5>
   @endif

</div>

</div>
<!-- /.container-fluid -->



@endsection