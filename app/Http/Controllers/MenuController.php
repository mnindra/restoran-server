<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
        $data['menu'] = Menu::all();
        return view('menu.index', $data);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
        $data['kategori'] = Kategori::all();
        return view('menu.create', $data);
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
            'nama' => 'required|string|max:50',
            'harga' => 'required|numeric',
            'id_kategori' => 'required',
            'gambar' => 'image|mimes:jpeg,bmp,png|max:1500'
            ])->validate();

            $filename = $request->file('gambar')->store('images');

            Menu::create([
                'nama' => $request->input('nama'),
                'harga' => $request->input('harga'),
                'id_kategori' => $request->input('id_kategori'),
                'gambar' => $filename
            ]);

            return redirect('/menu');
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
            $data['kategori'] = Kategori::all();
            $data['menu'] = Menu::find($id);
            return view('menu.edit', $data);
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
            Menu::find($id)->update([
                'nama' => $request->input('nama'),
                'harga' => $request->input('harga'),
                'id_kategori' => $request->input('id_kategori')
            ]);

            if ($request->file('gambar')) {
                // hapus gambar
                $menu = Menu::find($id);
                Storage::delete($menu->gambar);

                // upload ulang
                $filename = $request->file('gambar')->store('images');

                // update gambar di database
                Menu::find($id)->update([
                    'gambar' => $filename
                ]);
            }

            return redirect('/menu');
        }

        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */

        public function destroy($id)
        {
            $menu = Menu::find($id);
            Storage::delete($menu->gambar);
            Menu::destroy($id);
            return redirect('/menu');
        }
    }
