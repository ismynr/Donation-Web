<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class LayananPublic extends Model
{
    use LogsActivity;
    
    protected $table = 'layanan_publics';
    protected $primaryKey = 'id';
    protected $fillable = ['subject', 'nama', 'email', 'pesan'];

    // LOG ACTIVITY SPATIE
    protected static $logName = 'layanan_publics';
    protected static $logAttributes = ['subject', 'nama', 'email', 'pesan'];
    protected static $recordEvents = ['created'];
    protected static $logOnlyDirty = true;
}
