<?php

namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  // trait
  use RegistersUsers;

  protected $redirectTo = '/beranda';

  protected function guard()
  {
    return Auth::guard('petugas');
  }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'nama' => 'required|string|max:255',
      'telp' => 'required|numeric',
      'username' => 'required|alpha_num|unique:petugas,username|max:12',
      'password' => 'required|string|min:6|confirmed',
    ]);
  }

  protected function create(array $data)
  {
    return Petugas::create([
        'nama' => $data['nama'],
        'telp' => $data['telp'],
        'username' => $data['username'],
        'password' => bcrypt($data['password']),
    ]);
  }
}
