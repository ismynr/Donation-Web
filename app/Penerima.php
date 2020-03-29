<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $table = 'penerima';
    protected $primaryKey = 'id_penerima';
    protected $fillable = ['nama', 'alamat', 'tgl_lahir', 'jenkel', 'umur', 'jumkel', 'penghasilan'];

    public function donasi() {
        return $this->hasMany('App\Donasi');
    }
}
