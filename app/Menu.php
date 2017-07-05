<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    public $timestamps = false;
    protected $fillable = ['nama', 'harga', 'id_kategori', 'gambar'];

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'id_kategori');
    }
}
