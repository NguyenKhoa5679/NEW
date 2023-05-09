<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequireAuthor extends Model
{
    protected $table = 'quyentacgia';
    protected $fillable = ['user_id', 'tinhtrang'];

    public static function required($idUser)
    {
        if (!is_null(self::all()->where('user_id', $idUser)->first())) {
            return true;
        } else
            return false;

    }

}