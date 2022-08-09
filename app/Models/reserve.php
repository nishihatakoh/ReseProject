<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserve extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function shop(){
        return $this->belongsTo('App\Models\shop');
    }

    public function user(){
        return $this->belongsTo('App\Models\user');
    }
}
