@extends('layout')
@section('content')
<script>
  $( function() {
    $( "#join_date" ).datepicker();
  } );
  </script>
<div class="card">
  <div class="card-header">New Member Page</div>
  <div class="card-body">
      
      <form action="{{ url('members') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Address 1</label></br>
        <input type="text" name="address_1" id="address_1" class="form-control"></br>
        <label>Address 2</label></br>
        <input type="text" name="address_2" id="address_2" class="form-control"></br>
        <label>Post Code</label></br>
        <input type="text" name="post_code" id="post_code" class="form-control"></br>
        <label>Country</label></br>
        <input type="text" name="country" id="country" class="form-control"></br>
        <label>Join Date</label></br>
        <input type="text" name="join_date" id="join_date" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="tel" id="tel" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop