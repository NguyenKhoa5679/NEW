<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'yeuthich';
    protected $fillable = [
        'truyen_id', 'user_id'
    ];

    public static function getFavoriteListofUser($idUser)
    {
        return self::all()->where('user_id', $idUser);
    }
}