@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Time Found</th>
                <th>Reporter</th>
                <th>Place Found</th>
                <th>Colour</th>
                <th>Photo</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lostItems as $lostItem)
              <tr>
                <td>{{$lostItem->id}}</td>
                <td>{{$lostItem->category}}</td>
                <td>{{$lostItem->found_time}}</td>
                <td>{{lostItem->found_user}}</td>
                <td>{{lostItem->found_place}}</td>
                <td>{{lostItem->colour}}</td>
                <td>{{lostItem->photo}}</td>
                <td>{{lostItem->description}}</td>
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
