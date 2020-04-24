@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        @auth
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
              <label>Request User Name:</label>
              <input type="text" name="user_name" value="{{$item_request->user_name}}"/>
            </div>
            <div>
              <input name="item_id" type="hidden" value="{{$item_request->item_id}}"/>
            </div>
            <div>
              <input name="item_category" type="hidden" value="{{$item_request->item_category}}"/>
            </div>
            <div>
              <input name="item_description" type="hidden" value="{{$item_request->item_description}}"/>
            </div>
            <div class="col-md-8">
              <label>Request Reason:</label>
              <br/>
              <textarea id="black" rows="4" cols="50" name="reason">{{$item_request->reason}}</textarea>
            </div>
            <div class="col-md-8 col-md-offset-4">
              <input type="submit" class="btn btn-primary"/>
              <input type="reset" class="btn btn-warning"/>
              <a href="{{route('item_requests.index')}}" class="btn btn-primary" role="button">Back to the request list</a>
            </div>
          </form>
        </div>
        @else
        <div style="color:#ff0000;">Please login/register to access these services!</div>
        @endauth
      </div>
    </div>
  </div>
</div>
@endsection
