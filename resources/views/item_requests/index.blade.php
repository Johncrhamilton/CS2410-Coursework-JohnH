@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Current Requests</div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>User name</th>
                <th>Item id</th>
                <th>Item category</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($item_requests as $item_request)
              <tr>
                <td>{{$item_request['user_name']}}</td>
                <td>{{$item_request['item_id']}}</td>
                <td>{{$item_request['item_category']}}</td>
                <td><a href="{{action('ItemRequestController@show', $item_request['id'])}}" class="btn btn-primary">Details</a></td>
                <td><a href="{{action('ItemRequestController@edit', $item_request['id'])}}" class="btn btn-warning">Edit</a></td>
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
            <a href="{{ route('item_requests.create') }}" class="btn btn-primary">Add request</a>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
