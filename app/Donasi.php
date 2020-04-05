<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table = 'donasi';
    protected $fillable = ['id_kategori', 'jumlah_donasi', 'id_penerima', 'id_donatur', 'tanggal_memberi'];
    protected $primaryKey = 'id_donasi';
    
    public function category() {
        return $this->belongsTo('App\Category', 'id_kategori');
    }

    public function penerima() {
        return $this->belongsTo('App\Penerima', 'id_penerima');
    }

    public function donatur() {
        return $this->belongsTo('App\Donatur', 'id_donatur');
    }
}
