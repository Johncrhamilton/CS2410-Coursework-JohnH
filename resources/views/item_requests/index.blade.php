@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        @auth
        <div class="card-header">Current Requests</div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>User name</th>
                <th>Item category</th>
                <th>Item description</th>
                <th colspan="5">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($item_requests as $item_request)
              <tr>
                <td>{{$item_request['user_name']}}</td>
                <td>{{$item_request['item_category']}}</td>
                <td>{{$item_request['item_description']}}</td>
                <td><a href="{{action('ItemRequestController@show', $item_request['id'])}}" class="btn btn-primary">Details</a></td>
                <td>
                  <form action="{{action('ItemRequestController@destroy', $item_request['id'])}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-success" type="submit">Approve</button>
                  </form>
                </td>
                <td>
                  <form action="{{action('ItemRequestController@destroy', $item_request['id'])}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-warning" type="submit">Disapprove</button>
                  </form>
                </td>
                <td>
                  <form action="{{action('ItemRequestController@destroy', $item_request['id'])}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @else
        <div style="color:#ff0000;">Please login/register to access these services!</div>
        @endauth
      </div>
    </div>
  </div>
</div>
@endsection
