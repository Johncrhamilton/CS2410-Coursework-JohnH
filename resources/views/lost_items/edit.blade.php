@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        @auth
        <div class="card-header">Edit and update the lost item</div>
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
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ action('ItemRequestController@update',$lost_item['id']) }}" enctype="multipart/form-data">
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
              <input type="text" name="found_time" placeholder="YYYY-MM-DD hh:mm:ss"/>
            </div>
            <div class="col-md-8">
              <label>Place item was found:</label>
              <input type="text" name="found_place"/>
            </div>
            <div class="col-md-8">
              <label>Colour:</label>
              <input type="text" name="colour"/>
            </div>
            <div class="col-md-8">
              <label>Image of the item:</label>
              <input type="file" name="image" placeholder="Image file" />
            </div>
            <div class="col-md-8">
              <label>Description:</label>
              <br/>
              <textarea id="black" rows="4" cols="50" name="description">A description of the item.</textarea>
            </div>
            <div class="col-md-8 col-md-offset-4">
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
