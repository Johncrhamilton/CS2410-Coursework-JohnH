<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request;

class RequestController extends Controller
{
  public function show($id)
  {
    $request = Request::find($id);
    return view('show', array('request' => $request));
  }

  public function list()
  {
    return view('list', array('requests'=>Request::all()));
  }
}
