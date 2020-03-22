<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $table = 'donasi';
    protected $fillable = ['id_kategori', 'jumlah_donasi', 'nama_penerima', 'nama_user', 'tanggal_memberi'];
    protected $primaryKey = 'id_donasi';
    
}
