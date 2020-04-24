<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Title -->
  <title>Find-The-Lost</title>
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600">
  <!-- Styles -->
  <link href="{{url('css/filoWelcome.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{asset('css/app.css')}}" rel="stylesheet" >
</head>
<body>
  <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
      @auth
      <a href="{{ url('/home') }}"><span>Dashboard</span></a>
      @else
      <a href="{{ route('login') }}"><span>Login</span></a>
      @if (Route::has('register'))
      <a href="{{ route('register') }}"><span>Register</span></a>
      @endif
      @endauth
    </div>
    @endif
    <div class="content">
      <div class="title">
        Find The Lost
      </div>
      <div>
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif
        <div class="row justify-content-center">
          <div>
            @auth
            <a class="btn btn-primary" href="{{route('lost_items.create')}}">Add a lost item</a>
            @endauth
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Colour</th>
                  <th>Date found</th>
                  @auth
                  <th colspan="4">Actions</th>
                  @else
                  <th colspan="4">Login/Register for Actions</th>
                  @endauth
                </tr>
              </thead>
              <tbody>
                @foreach($lost_items as $lost_item)
                <tr>
                  <td>{{$lost_item['category']}}</td>
                  <td>{{$lost_item['colour']}}</td>
                  <td>{{$lost_item['found_time']}}</td>
                  @auth
                  <td><a href="{{action('LostItemController@show', $lost_item['id'])}}" class="btn btn-primary">Details</a></td>
                  <td><a href="{{action('ItemRequestController@create', $lost_item['id']) }}" class="btn btn-primary">Request</a></td>
                  @endauth
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
