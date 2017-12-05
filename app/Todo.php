<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    protected $fillable = [ 'body', 'priority_id', 'section_id' ];
}
