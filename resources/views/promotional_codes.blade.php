@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach ($promotionalCodes as $promotionalCode)
      <div class="codeContainer">
        <span class="code">{{ $promotionalCode->code }}</span>
        @if ($promotionalCode->claimed)
          <button class="claimedCodeBtn btn btn-danger" onclick="showSwal('claimed')">Claimed</button>
        @else
          <a href="{{ url('claim_code', $promotionalCode->id) }}" class="claimCodeBtn btn btn-primary" onclick="showSwal('claim')">Claim Now</a>
        @endif
      </div>
    @endforeach
@endsection
