<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Donasi extends Model
{
    use LogsActivity;

    protected $table = 'donasi';
    protected $fillable = ['id_kategori', 'jumlah_donasi', 'id_penerima', 'id_donatur', 'tanggal_memberi', 'pdf', 'gambar'];
    protected $primaryKey = 'id_donasi';

    // LOG ACTIVITY SPATIE
    protected static $logName = 'donasi';
    protected static $logAttributes = ['id_kategori', 'jumlah_donasi', 'id_penerima', 'id_donatur', 'tanggal_memberi', 'pdf', 'gambar'];
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logOnlyDirty = true;
    
    public function category() {
        return $this->belongsTo('App\Category', 'id_kategori');
    }

    public function penerima() {
        return $this->belongsTo('App\Penerima', 'id_penerima');
    }

    public function donatur() {
        return $this->belongsTo('App\Donatur', 'id_donatur');
    }
}
