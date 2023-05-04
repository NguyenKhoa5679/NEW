<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
   protected $table = 'chuong';
   protected $fillable = [
      'chuong_id', 'chuong_so', 'chuong_ten',
      'chuong_noidung', 'truyen_id', 'luotxem'
   ];
   public function book()
   {
      return $this->hasOne(book::class);
   }

   public static function countChapter($idTruyen){
       return self::all()->where('truyen_id', $idTruyen)->count();
   }
   public static function getChapter($idChapter){
       return self::all()->where('chuong_id', $idChapter)->first();
   }
}
