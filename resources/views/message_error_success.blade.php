@if(Session::get('success'))
<div class="alert alert-success alert-dismissible fade show msgHide" role="alert">
    <strong>Success!</strong> {{Session::get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{{Session::forget('success')}}
@endif
@if(Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show msgHide" role="alert">
    <strong>Error!</strong> {{Session::get('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{{Session::forget('error')}}
@endif
