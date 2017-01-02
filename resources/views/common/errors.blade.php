<!--  Als er zich een error voordoet.. -->
@if(count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    <!--  Voor elke error dat er zich voordoet, laat deze zien -->
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
