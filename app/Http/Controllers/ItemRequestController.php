<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemRequest;
use App\LostItem;
use Gate;

class ItemRequestController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $item_requests = ItemRequest::all();

    //If gate determines that user is not an admin
    if (Gate::denies('user-admin'))
    {
      $user = auth()->user();

      //If user is not a non object (guest)
      if(isset($user))
      {
        $item_requests = $item_requests->where('user_id', auth()->user()->id);
      }
    }
    $item_requests->toArray();
    return view('item_requests.index', compact('item_requests'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @param  int  $lost_item_id
  * @return \Illuminate\Http\Response
  */
  public function create($lost_item_id)
  {
    $lost_item = LostItem::find($lost_item_id);
    return view('item_requests.create', compact('lost_item'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //Form validation
    $item_request = $this->validate(request(),
    [
      'user_name' => 'required',
      'item_id' => 'required|numeric',
      'item_category' => 'required',
      'item_description' => 'required',
      'reason' => 'required',
    ]);

    //Set item request data with form values
    $item_request = new ItemRequest;
    $item_request->user_id = auth()->user()->id;
    $item_request->user_name = $request->input('user_name');
    $item_request->item_id = $request->input('item_id');
    $item_request->item_category = $request->input('item_category');
    $item_request->item_description = $request->input('item_description');
    $item_request->reason = $request->input('reason');
    $item_request->created_at = now();

    //Save
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
    //If gate determines that user is not an admin
    if (Gate::denies('user-admin'))
    {
      return back()->with('error','Only administrators can edit requests.');
    }

    //Form validation
    $item_request = ItemRequest::find($id);
    $this->validate(request(),
    [
      'user_name' => 'required',
      'reason' => 'required',
    ]);

    //Set item request data with form values
    $item_request->user_name = $request->input('user_name');
    $item_request->reason = $request->input('reason');
    $item_request->updated_at = now();

    //Save updated_at
    $item_request->save();
    return back()->with('success','Request has been updated.');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //If gate determines that user is not an admin
    if (Gate::denies('user-admin'))
    {
      return back()->with('error','Only administrators can delete item requests.');
    }

    //Remove specific item request from the database
    $item_request = ItemRequest::find($id);
    $item_request->delete();
    return redirect('item_requests')->with('success','Item request has been deleted.');
  }
}
