<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        @auth
          @if(Gate::allows('user-admin'))
            <!-- Display the errors -->
            <div class="card-header">Display item request</div>
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
              <table class="table table-striped" border="1" >
                <tr> <th>User id:</th> <td> {{$item_request['user_id']}}</td></tr>
                <tr> <th>User name:</th> <td>{{$item_request->user_name}}</td></tr>
                <tr> <th>Item id:</th> <td>{{$item_request->item_id}}</td></tr>
                <tr> <th>Item category:</th> <td>{{$item_request->item_category}}</td></tr>
                <tr> <th>Item description:</th> <td>{{$item_request->item_description}}</td></tr>
                <tr> <th>Reason:</th> <td style="max-width:150px">{{$item_request->reason}}</td></tr>
              </table>
              <table>
                <tr>
                  <td>
                    <a href="{{action('ItemRequestController@edit', $item_request['id'])}}" class="btn btn-warning">Edit</a>
                  </td>
                  <td>
                    <form action="{{action('ItemRequestController@destroy', $item_request['id'])}}" method="post">
                      @csrf
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                  </td>
                  <td>
                    <a href="{{route('item_requests.index')}}" class="btn btn-primary" role="button">Back to the request list</a>
                  </td>
                </tr>
              </table>
            </div>
          @else
            <div style="color:#ff0000;">Access denied!</div>
          @endif
        @else
          <div style="color:#ff0000;">Please login/register to access these services!</div>
        @endauth
      </div>
    </div>
  </div>
</div>
@endsection
