<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        @auth
          <div class="card-header">Current Requests</div>
          <!-- Display the errors -->
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
          @if (\Session::has('success'))
            <div class="alert alert-success">
              <p id="black">{{\Session::get('success')}}</p>
            </div>
            <br/>
          @endif

          <!-- Display the error alerts -->
          @if (\Session::has('error'))
            <div class="alert alert-danger">
              <p id="black">{{\Session::get('error')}}</p>
            </div>
            <br/>
          @endif

          <!-- Define the table -->
          <div class="card-body">
            @if(count($item_requests) > 0)
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>User name</th>
                    <th>Item category</th>
                    <th>Item description</th>
                    @if(Gate::allows('user-admin'))
                      <th colspan="4">Actions</th>
                    @else
                      <th colspan="1">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach($item_requests as $item_request)
                    <tr>
                      <td>{{$item_request['user_name']}}</td>
                      <td>{{$item_request['item_category']}}</td>
                      <td>{{$item_request['item_description']}}</td>
                      <td><a href="{{action('ItemRequestController@show', $item_request['id'])}}" class="btn btn-primary">Details</a></td>
                      @if(Gate::allows('user-admin'))
                        <td><a href="{{action('ItemRequestController@requestApprove', $item_request['user_id'])}}" class="btn btn-primary">Approve</a></td>
                          <td><a href="{{action('ItemRequestController@requestDisapprove', $item_request['user_id'])}}" class="btn btn-warning">Disapprove</a></td>
                        <td>
                          <form action="{{action('ItemRequestController@destroy', $item_request['id'])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                        </td>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @else
              <div>No requests.</div>
            @endif
          </div>
        @else
          <div style="color:#ff0000;">Please login/register to access these services!</div>
        @endauth
      </div>
    </div>
  </div>
</div>
@endsection
