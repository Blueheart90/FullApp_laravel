<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    //
    protected $fillable = ['ruta'];

    public function user()
    {
        return $this->belongsTo('App\Foto');
    }
}
