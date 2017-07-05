<?php

namespace App\Http\Controllers;

use App\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['meja'] = Meja::all();
        return view('meja.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => 'required|string|max:15',
            'username' => 'required|alpha_num|unique:meja',
            'password' => 'required|max:15'
        ])->validate();

        Meja::create($request->all());
        return redirect('/meja');
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
        //
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
        // Validator::make($request->all(), [
        //     'nama' => 'required|string|max:15',
        //     'username' => 'required|alpha_num|unique:meja',
        //     'password' => 'required|max:15'
        // ])->validate();

        Meja::find($id)->update($request->all());
        return redirect('/meja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Meja::destroy($id);
        return redirect('/meja');
    }
}
