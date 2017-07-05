<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  // trait
  use AuthenticatesUsers;

  protected $redirectTo = '/beranda';

  public function username()
  {
    return 'username';
  }

  protected function guard()
  {
    return Auth::guard('petugas');
  }
}
