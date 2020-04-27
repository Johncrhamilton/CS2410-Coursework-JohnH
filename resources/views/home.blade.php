@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <!-- Define the card -->
        <div class="card-header">Dashboard</div>
        <div class="card-body">
          <!-- Display the success alerts -->
          @if (session('status'))
            <div class="alert alert-success">
              <p id="black">{{session('status')}}</p>
            </div>
          @endif

          You are logged in!
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
