<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        @if(Gate::allows('user-admin'))
          <div class="card-header">Registered Users</div>
          <!-- display the errors -->
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li id="black">{{$error}}</li>
                @endforeach
              </ul>
            </div>
            <br/>
          @endif

          <!-- Display the success alerts -->
          @if (session('status'))
            <div class="alert alert-success">
              <p id="black">{{session('status')}}</p>
            </div>
          @endif

          <!-- Define the table -->
          <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Admin</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->admin}}</td>
                    <td>{{$user->email}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <div style="color:#ff0000;">Access denied!</div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
