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

    public function owner(){ 
        return $this->belongsTo('App\Models\owner');
    }

    public function reserves(){
        return $this->hasMany('App\Models\reserve');
    }

    public function favorite(){
        return $this->hasMany('App\Models\favorite');
    }

    public function isLikedBy($user): bool {
        return favorite::where('user_id', $user->id)->where('shop_id', $this->id)->first() !==null;
    }
}

