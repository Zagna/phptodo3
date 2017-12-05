<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    //
    public function todos() {
        return $this->hasMany(Todo::class);
    }
}
