<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Gate;

class UserController extends Controller
{
  public function display()
  {
    $usersQuery = User::all();
    if (Gate::denies('user-admin'))
    {
      $user = auth()->user();
      if(isset( $user ))
      {
        $usersQuery = $usersQuery->where('id', auth()->user()->id);
      }
    }
    return view('/displayUsers', array('users'=>$usersQuery));
  }
}
