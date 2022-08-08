<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function genre()
    {
        return $this->belongsTo('App\Models\genremaster');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\areamaster');
    }
}
