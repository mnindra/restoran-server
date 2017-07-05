<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = "pemesanan";
    protected $primaryKey = "id_pemesanan";
    public $timestamps = false;
    protected $fillable = ['tanggal', 'total', 'id_petugas', 'jam', 'nama', 'id_meja', 'id_status'];

    public function petugas()
    {
        return $this->belongsTo('App\Petugas', 'id_petugas');
    }

    public function meja()
    {
        return $this->belongsTo('App\Meja', 'id_meja');
    }

    public function detail()
    {
        return $this->hasMany('App\DetailPemesanan', 'id_pemesanan');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'id_status');
    }
}
