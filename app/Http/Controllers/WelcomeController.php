<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LostItem;

class WelcomeController extends Controller
{
  /**
  * Display a listing of lost items on the welcome view
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index()
  {
    $lost_items = LostItem::all()->toArray();
    return view('welcome', compact('lost_items'));
  }
}
