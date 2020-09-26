@extends('layouts.admin')

@section('content')


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
      New Annoucement
   </div>
</div>

<form method='post' action="{{ url('admin/announcement/create') }}">
@csrf
<div class="row">
   <div class="col-12 ">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Message <span class="required">*</span></label>
                  <textarea name="message" required  class="form-control" id="exampleFormControlTextarea1" rows="4">{{ $announcement->message }}</textarea>
               </div>
               <div class="form-row">
                  <button type="submit" class="btn btn-primary">Post Announcement</button>
               </div>
            </div>
        </div>
    </div>
</div>
</div>
   
@endsection
