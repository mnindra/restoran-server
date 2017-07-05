<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    protected $table = "detail_pemesanan";
    protected $primaryKey = "id_detail_pemesanan";
    public $timestamps = false;
    protected $fillable = ['jumlah', 'subtotal', 'id_menu', 'id_pemesanan'];

    public function menu()
    {
        return $this->belongsTo('App\Menu', 'id_menu');
    }

    public function pemesanan()
    {
        return $this->belongsTo('App\Pemesanan', 'id_pemesanan');
    }
}
