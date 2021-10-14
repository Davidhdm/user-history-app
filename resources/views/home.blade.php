@extends('layouts.app')

@section('content')
  <div class="wrapper row m-auto">
    @foreach ($offers as $offer)
      <div class="card offerCard" style="width: 18rem;">
        <img class="offerImg" src="{{ $offer->img }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title offerTitle">{{ $offer->title }}</h5>
          <p class="card-text">{{ $offer->description }}</p>
          <a href="{{ url('get_the_code') }}" class="btn btn-primary" onclick="showSwal('get_the_code')">Get the code</a>
        </div>
      </div>
    @endforeach
  </div>
@endsection
