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
   <div class="col-12 section-title">
      Platform Settings
   </div>
</div>

<form method='post' action="{{ url('admin/settings') }}">
@csrf
<div class="row">
   <div class="col-12 ">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <label for="pointsToCash">Coin Price <span class="required">*</span></label>
                  <input value="{{ $settings['coin_price']->value }}" step="any" required type="number" name="coin_price" class="form-control" id="pointsToCash" >
               </div>
               <div class="form-group">
                  <label >Licence Price <span class="required">*</span></label>
                  <input value="{{ $settings['licence_price']->value }}" required type="number" name="licence_price" class="form-control"  >
               </div>
               <div class="form-group">
                  <label >Amount in Reserve (USD)<span class="required">*</span></label>
                  <input value="{{ $settings['reserve']->value }}" required type="number" name="reserve" class="form-control"  >
               </div>
          
               <div class="form-row">
                  <button type="submit" class="btn btn-primary">Update</button>
               </div>
            </div>
        </div>
    </div>
</div>
</form>
</div>
</div>
   
@endsection
