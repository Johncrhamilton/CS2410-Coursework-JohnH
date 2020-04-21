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
                <th>Solicitant</th>
                <th>Item Category</th>
                <th>Reason</th>
                <th>Solicitant Id</th>
                <th>Item Id</th>
              </tr>
            </thead>
            <tbody>
              @foreach($requests as $request)
              <tr>
                <td>{{$request->id}}</td>
                <td>{{$request->user_name}}</td>
                <td>{{$request->item_category}}</td>
                <td>{{$request->reason}}</td>
                <td>{{$request->account_id}}</td>
                <td>{{$request->item_id}}</td>
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
