<?php

namespace App\Http\Controllers\Api;

use App\DetailPemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemesanan;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_meja)
    {
        $data['pemesanan'] = Pemesanan::where('id_meja', $id_meja)->get();
        return response()->json($data);
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
        // $request->input('tanggal') = date('Y-m-d');
        // $request->input('jam') = date('H:i:s');

        // insert data to table pemesanan
        $request->merge(['tanggal' => date('Y-m-d')]);
        $request->merge(['jam' => date('H:i:s')]);
        $id_pemesanan = Pemesanan::create($request->all())->id_pemesanan;

        $pesanan = json_decode($request->input('pesanan'));

        // insert data to table detail_pemesanan
        foreach ($pesanan as $row) {
            DetailPemesanan::create([
                'id_pemesanan' => $id_pemesanan,
                'id_menu' => $row->id_menu,
                'jumlah' => $row->jumlah,
                'subtotal' => $row->subtotal
            ]);
        }
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
        Pemesanan::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pemesanan::destroy($id);
    }
}
