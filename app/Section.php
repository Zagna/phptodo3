<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    public function todos()
        {
        return $this->hasMany(Todo::class);
        }

    public function user()
        {
        return $this->belongsTo(User::class);
        }

    protected $fillable = [ 'name' ];
}
