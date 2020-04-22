<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemRequest;

class ItemRequestController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $item_requests = ItemRequest::all()->toArray();
    return view('item_requests.index', compact('item_requests'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('item_requests.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $item_request = $this->validate(request(),
    [
      'user_name' => 'required',
      'item_id' => 'required',
      'item_category' => 'required',
      'reason' => 'required',
    ]);

    $item_request = new ItemRequest;
    $item_request->user_id = auth()->user()->id;
    $item_request->user_name = $request->input('user_name');
    $item_request->item_id = $request->input('item_id');
    $item_request->item_category = $request->input('item_category');
    $item_request->reason = $request->input('reason');
    $item_request->created_at = now();
    $item_request->save();
    return back()->with('success','The request for the item has been made please be pacient, you will recieve an email from an admin soon.');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $item_request = ItemRequest::find($id);
    return view('item_requests.show',compact('item_request'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $item_request = ItemRequest::find($id);
    return view('item_requests.edit',compact('item_request'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $item_request = ItemRequest::find($id);
    $this->validate(request(),
    [
      'user_name' => 'required',
      'item_id' => 'required',
      'item_category' => 'required',
      'reason' => 'required',
    ]);

    $item_request->user_name = $request->input('user_name');
    $item_request->item_id = $request->input('item_id');
    $item_request->item_category = $request->input('item_category');
    $item_request->reason = $request->input('reason');
    $item_request->created_at = now();
    $item_request->save();
    return redirect('item_requests')->with('success','Request has been updated.');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $item_request = ItemRequest::find($id);
    $item_request->delete();
    return redirect('item_requests')->with('success','Item request has been deleted.');
  }
}
