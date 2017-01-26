@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif
@if(Session::has('error_'))
<div class="alert alert-danger" role="alert">
    {{Session::get('error_')}}
</div>
@endif
