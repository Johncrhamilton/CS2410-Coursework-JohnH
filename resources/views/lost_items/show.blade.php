<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        @auth
          <div class="card-header">Display lost item</div>
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

          <!-- Define the table -->
          <div class="card-body">
            <table class="table table-striped" border="1" >
              @if(Gate::allows('user-admin'))
                <tr><th>Item Id:</th><td>{{$lost_item['id']}}</td></tr>
              @endif
              <tr><th>Category:</th><td>{{$lost_item->category}}</td></tr>
              <tr><th>Date Found:</th><td>{{$lost_item->found_time}}</td></tr>
              @if(Gate::allows('user-admin'))
                <tr><th>Finder Id:</th><td>{{$lost_item->found_user}}</td></tr>
              @endif
              <tr><th>Place Found:</th><td>{{$lost_item->found_place}}</td></tr>
              <tr><th>Colour:</th><td>{{$lost_item->colour}}</td></tr>
              <tr>
                <th>Image</th>
                <td colspan='2'>
                  <img style="width:400px; height:400px;" src="{{asset('storage/images/'.$lost_item->image)}}">
                </td>
              </tr>
              <tr><th>Description</th><td style="max-width:150px">{{$lost_item->description}}</td></tr>
            </table>
            <table>
              <tr>
                @if(Gate::allows('user-admin'))
                  <td>
                    <a href="{{action('LostItemController@edit', $lost_item['id'])}}" class="btn btn-warning">Edit</a>
                  </td>
                  <td>
                    <form action="{{action('LostItemController@destroy', $lost_item['id'])}}" method="post">
                      @csrf
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                  </td>
                @endif
                <td>
                  <a href="{{url('/')}}" class="btn btn-primary">Back to the lost item list</a>
                </td>
              </tr>
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
