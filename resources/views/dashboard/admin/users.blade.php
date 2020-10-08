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
         Users ({{ $count }})
      </div>
   </div>
</div>

<div class="section-content">
@if(count($users))
        @foreach ($users as $user)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-md-2">
                        <img src="{{ asset($user->dp) }}" class="thumb-small" />
                    </div> -->
                    <div class="col-md-4">
                        <b>{{ $user->full_name }}</b>
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->phone_number }}</p>
                    </div>
                    <div class="col-md-4" id="{{ $user->id }}">
                        <b>FAC: {{ $user->coin_balance }}</b>
                        <p>Status: <span class="user-status">{{ $user->status }}</span></p>
                        @if($user->status == 'ACTIVE')
                            <button class="btn btn-danger action-btn btn-sm suspend-btn">Suspend User</button>
                        @else
                            <button class="btn btn-success action-btn btn-sm activate-btn">Activate User</button>

                        @endif
                        @if($user->amb_code)
                            <button class="btn btn-primary btn-sm disabled">Ambassador Code: {{ $user->amb_code }}</button>
                        @else
                            <button class="btn btn-success action-btn btn-sm make-ambassador-btn">Make Ambassador</button>

                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class='col-12'>
        {{ $users->links() }}
        </div>
      @endif
</div>

<!-- Suspend/Activate Modal -->
<div class="modal fade" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this post?. Action is irreversible.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success confirm">Confirm</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
var userId = 0;
var url = null;
var $actionButton = null;

$('button.action-btn').on('click', function(){
   resetActionModal();
   userId = $(this).parent().attr('id');
   $actionButton = $(this);
   showActionModal();
});
$('button.confirm').on('click', function() {
   updateUser();

});

function showActionModal() {
    if ($actionButton.hasClass('suspend-btn')) {
        $('.modal-title').text('Suspend User');
        $('.modal-body').text('Are you sure you want to suspend this user ?');
       url = "{{ url('admin/user/status/update?status=SUSPENDED') }}";

    }

    else if ($actionButton.hasClass('make-ambassador-btn')) {
        $('.modal-title').text('Make User Ambassador');
        $('.modal-body').text('Are you sure you want to this user an Ambassador on Faruna Coin?');
       url = "{{ url('admin/user/ambassador/update?status=1') }}";

    }
    //we are activating users
    else {
        $('.modal-title').text('Activate User');
        $('.modal-body').text('Are you sure you want to activate this user ?');
         url = "{{ url('admin/user/status/update?status=ACTIVE') }}";

    }

   $('#actionModal').modal('show');

}
   function updateUser() {
      console.log(url);
       
      $('.modal-body').html("<div style='text-align:center'><img src='{{ asset('images/loading.gif') }}' /><p>Updating user please wait</p></div>");
      $('button.confirm').hide();

      $.ajax({
         url: url,
         data: {
        "_token": "{{ csrf_token() }}",
        "user_id": userId
        },
         type: 'POST',
         success: function(res) {
            if(typeof res !== undefined ) {
               res = JSON.parse(res);
               console.log(res);
               window.res = res;

               if (res.success) {
               $('.modal-body').html("<div style='text-align:center'><p class='success'>User updated successfully</p></div>");
                updateActionButton();

               }
               else {
               $('.modal-body').html("<div style='text-align:center'><p class='error-text'>"+res.msg+"</p></div>");
            resetActionModal();

               }
            }
            else {
               $('.modal-body').html("<div style='text-align:center'><p class='error-text'>Network Error. check your connection and try again</p></div>");
                resetActionModal();
               
               
            }
         },
         error: function(error) {
             console.log(error);
            $('.modal-body').html("<div style='text-align:center'><p class='error-text'>Network Error. check your connection and try again</p></div>");
            resetActionModal();
         }
      })
   }

   function updateActionButton() {
      if ($actionButton.hasClass('suspend-btn')) {
          $actionButton.removeClass(['suspend-btn', 'btn-danger']).addClass(['activate-btn', 'btn-success']).text('Activate User');
          $('span.user-status').text('SUSPENDED');
       
    }
    else if ($actionButton.hasClass('make-ambassador-btn')) {
        $actionButton.removeClass(['make-ambassador-btn', 'action-btn', 'btn-success']).addClass(['btn-primary', 'disabled']).text('Ambassador Code : '+window.res.ambassadorCode);
        $('span.user-status').text('ACTIVE');

       

    }
    
    else if ($actionButton.hasClass('activate-btn')) {
        $actionButton.removeClass(['activate-btn', 'btn-success']).addClass(['suspend-btn', 'btn-danger']).text('Suspend User');
        $('span.user-status').text('ACTIVE');

       

    }

   }
   function resetActionModal() {
      $('button.confirm').show();

   }
})


</script>
</div>
   
@endsection
