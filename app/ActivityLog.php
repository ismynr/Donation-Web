<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'subject', 'url', 'method', 'ip', 'agent', 'id_user'
    ];
}
