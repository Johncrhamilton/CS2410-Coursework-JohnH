<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Gate;

class UserController extends Controller
{
  /**
  * Display a list of users
  *
  * @return \Illuminate\Http\Response
  */
  public function display()
  {
    $usersQuery = User::all();

    //If gate determines that user is not an admin
    if (Gate::denies('user-admin'))
    {
      $user = auth()->user();

      //If user is not a non object (guest)
      if(isset( $user ))
      {
        $usersQuery = $usersQuery->where('id', auth()->user()->id);
      }
    }
    return view('/displayUsers', array('users'=>$usersQuery));
  }
}
