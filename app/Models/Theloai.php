<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model{
   protected $table = 'theloai';
   protected $fillable = ['truyen_theloai', 'ten_theloai'];
    public static function getTheLoai($idTheloai){
        return self::all()->where('truyen_theloai', $idTheloai)->first();
    }
    public static function getListTheLoai(){
        return self::all();
    }
    public static function getIDTheLoai($tenTheLoai){
        return self::all()->where('ten_theloai', $tenTheLoai)->first();
    }
}