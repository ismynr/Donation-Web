<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use LogsActivity;

    protected $table = 'category';
    protected $fillable = ['nama_kategori', 'gambar', 'pdf'];
    protected $primaryKey = 'id_kategori';

    // LOG ACTIVITY SPATIE
    protected static $logName = 'category';
    protected static $logAttributes = ['nama_kategori', 'gambar'];
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logOnlyDirty = true;

    public function donasi() {
        return $this->hasMany('App\Donasi');
    }
}
