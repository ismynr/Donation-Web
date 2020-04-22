<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $table = 'donatur';
    protected $fillable = ['nama_depan', 'email', 'nama_belakang', 'no_hp', 'alamat', 'umur'];
    protected $primaryKey = 'id_donatur';

    public function getData(){
        return static::orderBy('created_at','DESC')->get();
    }

    public function user() {
        return $this->hasOne('App\User');
    }

    public function donasi() {
        return $this->hasMany('App\Donasi', 'id_donatur');
    }
}
