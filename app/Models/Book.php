<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager;

class Book extends Model
{
   protected $table = 'truyen';
   protected $fillable = [
      'truyen_id', 'truyen_ten', 'truyen_img',
      'truyen_theloai', 'truyen_mota', 'truyen_ngaydang',
      'truyen_tinhtrang', 'tacgia', 'iduser'
   ];

   public static function getBookIDUser($iduser){
      return self::all()->where('iduser', $iduser);
   }


   public static function getBook($id){
      return self::all()->where('truyen_id', $id)->first();
   }

   public static function getBookByTheLoai($idtheloai){
       return Manager::select("Select * from truyen where truyen_theloai like concat('%', :idtheloai, '%');",
       [
           'idtheloai' => $idtheloai
       ]);
//       return self::all()->where('truyen_theloai', 'like',  '"%'.$idtheloai.'%"');
   }


}
