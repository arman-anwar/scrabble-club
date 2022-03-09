@extends('layout')
@section('content')
<script>
  $( function() {
    $( "#join_date" ).datepicker();
  } );
  </script>
<div class="card">
  <div class="card-header">Member details page</div>
  <div class="card-body">
      
      <form action="{{ url('members/' .$member->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$member->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$member->name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address_1" id="address_1" value="{{$member->address_1}}" class="form-control"></br>
        <label>Address 2</label></br>
        <input type="text" name="address_2" id="address_2" value="{{$member->address_2}}"   class="form-control"></br>
        <label>Post Code</label></br>
        <input type="text" name="post_code" id="post_code" value="{{$member->post_code}}"  class="form-control"></br>
        <label>Country</label></br>
        <input type="text" name="country" id="country" value="{{$member->country}}"   class="form-control"></br>
        <label>Join Date</label></br>
        <input type="text" name="join_date" id="join_date" value="{{$member->join_date}}"  class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="tel" id="tel" value="{{$member->tel}}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop