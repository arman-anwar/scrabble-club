@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">Members Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Name : {{ $member->name }}</h5>
        <p class="card-text">Address 1 : {{ $member->address_1 }}</p>
        <p class="card-text">Address 2 : {{ $member->address_2 }}</p>
        <p class="card-text">Post Code : {{ $member->post_code }}</p>
        <p class="card-text">Country : {{ $member->country }}</p>
        <p class="card-text">Tel : {{ $member->tel }}</p>
        <p class="card-text">Join Date : {{ $member->join_date }}</p>
        <p class="card-text">Avg Score : {{ $member->avg_score }}</p>
        <p class="card-text">Games Won : {{ $member->total_wins }}</p>
        <p class="card-text">Games Lost : {{ $member->total_losses }}</p>
        <p class="card-text">Highest Score : {{ $member->highest_score }}
        <pre> <br> Opponent : {{ $member->highest_score_opponent }}
        <br> Date : {{ $member->highest_score_date }}
        <br> Venue : {{ $member->highest_score_venue }} </pre>


        </p>
  </div>
      
    </hr>
  
  </div>
</div>