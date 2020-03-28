<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use Notifiable;

    protected $guarded = [];

    protected $primaryKey = 'id_donatur';
}
