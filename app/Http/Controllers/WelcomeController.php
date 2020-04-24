<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LostItem;

class WelcomeController extends Controller
{
  /**
  *
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index()
  {
    $lost_items = LostItem::all()->toArray();
    return view('welcome', compact('lost_items'));
  }
}
