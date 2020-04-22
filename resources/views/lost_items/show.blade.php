@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Display lost item</div>
        <div class="card-body">
          <table class="table table-striped" border="1" >
            <tr><th>Item Id</th><td>{{$lost_item['id']}}</td></tr>
            <tr><th>Category</th><td>{{$lost_item->category}}</td></tr>
            <tr><th>Date found</th><td>{{$lost_item->found_time}}</td></tr>
            <tr><th>Finder</th><td>{{$lost_item->found_user}}</td></tr>
            <tr><th>Place found</th><td>{{$lost_item->found_place}}</td></tr>
            <tr><th>Colour</th><td>{{$lost_item->colour}}</td></tr>
            <tr>
              <th>Image</th>
              <td colspan='2'>
                <img style="width:100%; height:100%" src="{{ asset('storage/images/'.$lost_item->image)}}">
              </td>
            </tr>
            <tr><th>Description</th><td style="max-width:150px">{{$lost_item->reason}}</td></tr>
          </table>
          <table>
            <tr>
              <td>
                <a href="{{action('ItemRequestController@edit', $lost_item['id'])}}" class="btn btn-warning">Edit</a>
              </td>
              <td>
                <form action="{{action('ItemRequestController@destroy', $lost_item['id'])}}" method="post">
                  @csrf
                  <input name="_method" type="hidden" value="DELETE">
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
              <td>
                <a href="{{route('lost_items.index')}}" class="btn btn-primary" role="button">Back to the list</a>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
