<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
