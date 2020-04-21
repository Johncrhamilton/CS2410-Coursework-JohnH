<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Gate;

class UserController extends Controller
{
  public function show($id)
  {
    $user = User::find($id);
    return view('show', array('user' => $user));
  }

  public function list()
  {
    return view('list', array('users'=>User::all()));
  }

  public function display()
  {
    $usersQuery = User::all();
    if (Gate::denies('displayall'))
    {
      $usersQuery = $usersQuery->where('id', auth()->user()->id);
    }
    return view('/display', array('users'=>$usersQuery));
  }
}
