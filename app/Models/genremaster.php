<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genremaster extends Model
{
    use HasFactory;

    protected $fillable =['genre_name'];

    public function genre(){
        return $this->hasMany('App\Models\shop');
    }
}
