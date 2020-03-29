<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table = 'donasi';
    protected $fillable = ['id_kategori', 'jumlah_donasi', 'id_penerima', 'id_donatur', 'tanggal_memberi'];
    protected $primaryKey = 'id_donasi';
    
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function penerima() {
        return $this->belongsToMany('App\Penerima');
    }

    public function donatur() {
        return $this->belongsToMany('App\Donatur');
    }
}
