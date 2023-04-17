<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   protected $table = 'truyen';
   protected $fillable = [
      'truyen_id', 'truyen_ma','truyen_ten', 'truyen_img',
      'truyen_theloai', 'truyen_mota', 'truyen_ngaydang',
      'truyen_sochuong', 'truyen_tinhtrang', 'idtacgia'
   ];

   public static function getBookID($idtacgia){
      return self::all()->where('idtacgia', $idtacgia);
   }

   public static function getBook($id){
      return self::all()->where('truyen_id', $id)->first();
   }

}
