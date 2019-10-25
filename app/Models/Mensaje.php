<?php

namespace Lacomita\Models;

use Illuminate\Database\Eloquent\Model;
use Lacomita\User;

class Mensaje extends Model
{

    protected $guarded = ['id'];


    public function msjenviado()
    {
    	return $this->belongsTo(User::class, 'envio_id');
    }
}

