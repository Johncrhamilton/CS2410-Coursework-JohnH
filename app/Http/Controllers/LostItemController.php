<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LostItem;

class LostItemController extends Controller
{
  public function show($id)
  {
    $lostItem = LostItem::find($id);
    return view('show', array('lost item' => $lostItem));
  }

  public function list()
  {
    return view('list', array('lost items'=>LostItem::all()));
  }
}
