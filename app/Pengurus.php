<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $table = 'pengurus';
    protected $primaryKey = 'id_pengurus';
    protected $fillable = ['id_user', 'nip', 'nama', 'jabatan'];

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }
}
