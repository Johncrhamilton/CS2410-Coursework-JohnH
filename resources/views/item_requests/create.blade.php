<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        @auth
        <div class="card-header">Create a new request for an item</div>
        <!-- display the errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li id="black">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <br/>
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p id="black">{{ \Session::get('success') }}</p>
        </div>
        <br/>
        @endif
        @if (\Session::has('error'))
        <div class="alert alert-danger">
          <p id="black">{{ \Session::get('error') }}</p>
        </div>
        <br/>
        @endif
        <!-- define the form -->
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{url('item_requests') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8">
              <label>Your name:</label>
              <input type="text" name="user_name"/>
            </div>
            <div class="col-md-8">
              <label>Reason:</label>
              <br/>
              <textarea id="black" rows="4" cols="50" name="reason" placeholder="The Reason behind the item request."></textarea>
            </div>
            <div>
              <input name="item_id" type="hidden" value="{{$lost_item->id}}"/>
            </div>
            <div>
              <input name="item_category" type="hidden" value="{{$lost_item->category}}"/>
            </div>
            <div>
              <input name="item_description" type="hidden" value="{{$lost_item->description}}"/>
            </div>
            <div class="col-md-6 col-md-offset-4">
              <input type="submit" class="btn btn-primary"/>
              <input type="reset" class="btn btn-warning"/>
              <a href="{{ url('/') }}" class="btn btn-primary">Back to the lost item list</a>
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
