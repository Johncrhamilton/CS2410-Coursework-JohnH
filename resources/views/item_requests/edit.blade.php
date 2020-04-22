@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Edit and update the request</div>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <br/>
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div>
        <br/>
        @endif
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ action('ItemRequestController@update',$item_request['id']) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="col-md-8">
              <label>Request User Name</label>
              <input type="text" name="user_name" value="{{$item_request->user_name}}"/>
            </div>
            <div class="col-md-8">
              <label>Item id</label>
              <input type="text" name="item_id" value="{{$item_request->item_id}}"/>
            </div>
            <div class="col-md-8">
              <label>Request Item Category</label>
              <select name="item_category" value="{{ $item_request->item_category }}">
                <option value="pet">Pet</option>
                <option value="phone">Phone</option>
                <option value="jewellery">Jewellery</option>
              </select>
            </div>
            <div class="col-md-8">
              <label>Request Reason</label>
              <textarea rows="4" cols="50" name="reason">{{$item_request->reason}}</textarea>
            </div>
            <div class="col-md-6 col-md-offset-4">
              <input type="submit" class="btn btn-primary"/>
              <input type="reset" class="btn btn-primary"/>
              <a href="{{route('item_requests.index')}}" class="btn btn-primary" role="button">Back to the list</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
