<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areamaster extends Model
{
    use HasFactory;

    protected $fillable =['area_name'];

    public function area(){
        return $this->hasMany('App\Models\shop');
    }
}
