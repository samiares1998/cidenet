<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    public function adoptante()
    {
        return $this->belongsTo('App\Persona', 'adoptante_idadoptante ');
    }
}
