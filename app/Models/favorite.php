<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\shop');
    }
    //いいねが既にされているかを確認
    public function favorite_exist($id, $shop_id)
    {
        $exist = favorite::where('user_id', '=', $id)->where('shop_id', '=', $shop_id)->get();

        if (!$exist->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }
    
}
