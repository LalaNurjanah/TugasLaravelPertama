<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
    use HasFactory;

    protected $table = 'groups';

    public function friends()
    {
        return $this->hasMany('App\Models\Friends');
    }
}
