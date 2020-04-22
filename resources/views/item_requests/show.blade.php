@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Display item request</div>
        <div class="card-body">
          <table class="table table-striped" border="1" >
            <tr> <th>User id</th> <td> {{$item_request['user_id']}}</td></tr>
            <tr> <th>User name</th> <td>{{$item_request->user_name}}</td></tr>
            <tr> <th>Item id</th> <td>{{$item_request->item_id}}</td></tr>
            <tr> <th>Item category</th> <td>{{$item_request->item_category}}</td></tr>
            <tr> <th>Reason</th> <td style="max-width:150px">{{$item_request->reason}}</td></tr>
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
                <a href="{{route('item_requests.index')}}" class="btn btn-primary" role="button">Back to the list</a>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
