<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">Add a new lost item</div>
        <!-- display the errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul> @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> @endforeach
          </ul>
        </div><br /> @endif
        <!-- display the success status -->
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br /> @endif
        <!-- define the form -->
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{url('lost_items') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8">
              <label>Item category</label>
              <select name="category">
                <option value="pet">Pet</option>
                <option value="phone">Phone</option>
                <option value="jewellery">Jewellery</option>
              </select>
            </div>
            <div class="col-md-8">
              <label>Date and time item was roughly found</label>
              <input type="text" name="found_time" placeholder="YYYY-MM-DD hh:mm:ss"/>
            </div>
            <div class="col-md-8">
              <label>Place item was found</label>
              <input type="text" name="found_place"/>
            </div>
            <div class="col-md-8">
              <label>Colour</label>
              <input type="text" name="colour"/>
            </div>
            <div class="col-md-8">
              <label>Image of the item</label>
              <input type="file" name="image" placeholder="Image file" />
            </div>
            <div class="col-md-8">
              <label>Description</label>
              <textarea rows="4" cols="50" name="description">A description of the item.</textarea>
            </div>
            <div class="col-md-6 col-md-offset-4">
              <input type="submit" class="btn btn-primary"/>
              <input type="reset" class="btn btn-primary"/>
              <a href="{{ url('lost_items') }}" class="btn btn-primary">Back to the list</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
