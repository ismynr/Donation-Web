<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['nama_kategori'];
    protected $primaryKey = 'id_kategori';

    public function donasi() {
        return $this->hasMany('App\Category');
    }
}
