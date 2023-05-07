<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'baocao';
    protected $fillable = [
        'idbaocao', 'truyen_id', 'user_id', 'LyDo'
    ];

    public static function getReportOfStory($idTruyen){
        return self::all()->where('truyen_id' , $idTruyen);
    }


}