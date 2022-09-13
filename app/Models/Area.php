<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable =['area_name'];

    public function area(){
        return $this->hasMany('App\Models\Shop');
    }
}