<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Donatur extends Model
{
    use LogsActivity;

    protected $table = 'donatur';
    protected $fillable = ['nama_depan', 'email', 'nama_belakang', 'no_hp', 'alamat', 'umur', 'pdf', 'gambar'];
    protected $primaryKey = 'id_donatur';

    // LOG ACTIVITY SPATIE
    protected static $logName = 'donatur';
    protected static $logAttributes = ['nama_depan', 'email', 'nama_belakang', 'no_hp', 'alamat', 'umur', 'pdf', 'gambar'];
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logOnlyDirty = true;

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
