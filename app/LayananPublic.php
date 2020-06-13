<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayananPublic extends Model
{
    protected $table = 'layanan_publics';
    protected $primaryKey = 'id';
    protected $fillable = ['subject', 'nama', 'email', 'pesan'];
}
