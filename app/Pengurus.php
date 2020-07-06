<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Pengurus extends Model
{
    use LogsActivity;

    protected $table = 'pengurus';
    protected $primaryKey = 'id_pengurus';
    protected $fillable = ['id_user', 'nip', 'nama', 'jabatan', 'pdf', 'gambar'];

    // LOG ACTIVITY SPATIE
    protected static $logName = 'pengurus';
    protected static $logAttributes = ['id_user', 'nip', 'nama', 'jabatan', 'pdf', 'gambar'];
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logOnlyDirty = true;

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }
}
