<?php

namespace App\Models;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $table = 'binhluan';
    protected $fillable = [
        'idbinhluan', 'truyen_id', 'user_id',
        'rating', 'noiDung'
    ];

    public static function getCommentOfStory($idTruyen)
    {
//        return self::all()->where('truyen_id', $idTruyen);
//        return Manager::table('binhluan')->orderBy('updated_at', 'asc')->where('truyen_id', $idTruyen);
        return Manager::select('select * from binhluan where truyen_id = :truyen_id order by updated_at desc ', ['truyen_id' => $idTruyen]);
    }


}