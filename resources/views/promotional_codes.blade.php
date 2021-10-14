@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach ($promotionalCodes as $promotionalCode)
      <div class="codeContainer">
        <span class="code">{{ $promotionalCode->code }}</span>
        @if ($promotionalCode->claimed)
          <button class="claimedCodeBtn btn btn-danger">Claimed</button>
        @else
          <a href="{{ url('claim_code', $promotionalCode->id) }}" class="claimCodeBtn btn btn-primary">Claim Now</a>
        @endif
      </div>
    @endforeach
  </div>
@endsection
