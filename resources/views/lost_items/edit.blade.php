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
            <div class="card-header">Edit and update the lost item</div>
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

            <!-- Define the form -->
            <div class="card-body">
              <form class="form-horizontal" method="POST" action="{{action('LostItemController@update',$lost_item['id'])}}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="col-md-8">
                  <label>Item category:</label>
                  <select id="black" name="category">
                    <option id="black" value="pet">Pet</option>
                    <option id="black" value="phone">Phone</option>
                    <option id="black" value="jewellery">Jewellery</option>
                  </select>
                </div>
                <div class="col-md-8">
                  <label>Time item was roughly found:</label>
                  <input type="text" name="found_time" value="{{$lost_item->found_time}}"/>
                </div>
                <div class="col-md-8">
                  <label>Place item was found:</label>
                  <input type="text" name="found_place" value="{{$lost_item->found_place}}"/>
                </div>
                <div class="col-md-8">
                  <label>Colour:</label>
                  <input type="text" name="colour" value="{{$lost_item->colour}}"/>
                </div>
                <div class="col-md-8">
                  <label>Image of the item:</label>
                  <input id="white" type="file" name="image" placeholder="Image file"/>
                </div>
                <div class="col-md-8">
                  <label>Description:</label>
                  <br/>
                  <textarea id="black" rows="4" cols="50" name="description">{{$lost_item->description}}</textarea>
                </div>
                <div class="col-md-8 col-md-offset-4">
                  <input type="submit" class="btn btn-primary"/>
                  <input type="reset" class="btn btn-warning"/>
                  <a href="{{url('/')}}" class="btn btn-primary">Back to the lost item list</a>
                </div>
              </form>
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
