<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Penerima extends Model
{
    use LogsActivity;

    protected $table = 'penerima';
    protected $primaryKey = 'id_penerima';
    protected $fillable = ['nama', 'alamat', 'tgl_lahir', 'jenkel', 'umur', 'jumkel', 'penghasilan', 'pdf', 'gambar'];

    // LOG ACTIVITY SPATIE
    protected static $logName = 'penerima';
    protected static $logAttributes = ['nama', 'alamat', 'tgl_lahir', 'jenkel', 'umur', 'jumkel', 'penghasilan', 'pdf', 'gambar'];
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logOnlyDirty = true;

    public function donasi() {
        return $this->hasMany('App\Donasi', 'id_penerima');
    }
}
