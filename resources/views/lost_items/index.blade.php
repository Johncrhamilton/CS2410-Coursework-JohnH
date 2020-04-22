@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Current Lost Items</div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Category</th>
                <th>Colour</th>
                <th>Date found</th>
                <th colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lost_items as $lost_item)
              <tr>
                <td>{{$lost_item['category']}}</td>
                <td>{{$lost_item['colour']}}</td>
                <td>{{$lost_item['found_time']}}</td>
                <td><a href="{{action('LostItemController@show', $lost_item['id'])}}" class="btn btn-primary">Details</a></td>
                <td><a href="{{action('LostItemController@edit', $lost_item['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                  <form action="{{action('LostItemController@destroy', $lost_item['id'])}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
