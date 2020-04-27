<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LostItem;
use Gate;

class LostItemController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $lost_items = LostItem::all()->toArray();
    return view('welcome', compact('lost_items'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('lost_items.create');
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
    $lost_item = $this->validate(request(),
    [
      'category' => 'required',
      'found_time' => 'required|date_format:Y-m-d H:i:s',
      'found_place' => 'required|string',
      'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
      'description' => 'required|string',
    ]);

    //Handles the uploading of the image
    if ($request->hasFile('image'))
    {
      //Gets the filename with the extension
      $fileNameWithExt = $request->file('image')->getClientOriginalName();
      //just gets the filename
      $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      //Just gets the extension
      $extension = $request->file('image')->getClientOriginalExtension();
      //Gets the filename to store
      $fileNameToStore = $filename.'_'.time().'.'.$extension;
      //Uploads the image
      $path =$request->file('image')->storeAs('public/images', $fileNameToStore);
    }
    else
    {
      $fileNameToStore = 'noimage.jpg';
    }

    //Set item request data with form values
    $lost_item = new LostItem;
    $lost_item->category = $request->input('category');
    $lost_item->found_time = $request->input('found_time');
    $lost_item->found_user = auth()->user()->id;
    $lost_item->found_place = $request->input('found_place');
    $lost_item->colour = $request->input('colour');
    $lost_item->image = $fileNameToStore;;
    $lost_item->description = $request->input('description');
    $lost_item->created_at = now();

    //Save
    $lost_item->save();
    return back()->with('success','The lost item has been added.');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $lost_item = LostItem::find($id);
    return view('lost_items.show',compact('lost_item'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $lost_item = LostItem::find($id);
    return view('lost_items.edit',compact('lost_item'));
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
      return back()->with('error','Only administrators can edit items.');
    }

    $lost_item = LostItem::find($id);

    //Form validation
    $this->validate(request(),
    [
      'category' => 'required',
      'found_time' => 'required|date_format:Y-m-d H:i:s',
      'found_place' => 'required|string',
      'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
      'description' => 'required|string',
    ]);

    //Handles the uploading of the image
    if ($request->hasFile('image'))
    {
      //Gets the filename with the extension
      $fileNameWithExt = $request->file('image')->getClientOriginalName();
      //just gets the filename
      $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      //Just gets the extension
      $extension = $request->file('image')->getClientOriginalExtension();
      //Gets the filename to store
      $fileNameToStore = $filename.'_'.time().'.'.$extension;
      //Uploads the image
      $path =$request->file('image')->storeAs('public/images', $fileNameToStore);
      //Update image
      $lost_item->image = $fileNameToStore;
    }

    //Set item request data with form values
    $lost_item->category = $request->input('category');
    $lost_item->found_time = $request->input('found_time');
    $lost_item->found_place = $request->input('found_place');
    $lost_item->colour = $request->input('colour');
    $lost_item->description = $request->input('description');
    $lost_item->created_at = now();

    //Save
    $lost_item->save();
    return back()->with('success','The lost item has been updated.');
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
      return back()->with('error','Only administrators can delete items.');
    }

    //Remove specific lost item from the database
    $lost_item = LostItem::find($id);
    $lost_item->delete();
    return redirect('/')->with('success','The lost item has been deleted.');
  }
}
