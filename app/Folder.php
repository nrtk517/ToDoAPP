<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title'
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
