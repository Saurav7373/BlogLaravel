@if(count($errors) > 0)
@foreach ($errors->all() as $error)
<center>
    <p class='alert alert-danger'>{{ $error }}</p>
</center>
@endforeach
@endif