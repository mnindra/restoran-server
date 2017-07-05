<?php

namespace App\Http\Controllers\Api;

use App\Meja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        Validator::make($request->all(), [
            'username' => 'required|alpha_num',
            'password' => 'required'
        ])->validate();

        $data = Meja::select('id_meja', 'nama')->where('username', $request->input('username'))->where('password', $request->input('password'))->first();
        return response()->json($data);
    }
}
