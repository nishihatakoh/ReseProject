<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function owner(){ 
        return $this->belongsTo('App\Models\Owner');
    }

    public function reserves(){
        return $this->hasMany('App\Models\Reserve');
    }

    public function favorite(){
        return $this->hasMany('App\Models\Favorite');
    }

    public function reviews(){
        return $this->hasMany('App\Models\Favorite');
    }

    public function isLikedBy($user): bool {
        return favorite::where('user_id', $user->id)->where('shop_id', $this->id)->first() !==null;
    }
}

