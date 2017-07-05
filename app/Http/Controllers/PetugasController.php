<?php

namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data['petugas'] = Petugas::all();
        return view('petugas.index', $data);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('petugas.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // validate input
        Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'telp' => 'required|numeric',
            'username' => 'required|alpha_num|unique:petugas,username|max:12',
            'password' => 'required|string|min:6|confirmed',
            ])->validate();

            // store data to database
            Petugas::create([
                'nama' => $request->input('nama'),
                'telp' => $request->input('telp'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
            ]);

            // redirect
            return redirect('/petugas');
        }

        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            //
        }

        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            $data['petugas'] = Petugas::find($id);
            return view('petugas.edit', $data);
        }

        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
            Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'telp' => 'required|numeric'
                ])->validate();

                Petugas::find($id)->update($request->all());

                return redirect('/petugas');
            }

            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy($id)
            {
                Petugas::destroy($id);
                return redirect('/petugas');
            }
        }
