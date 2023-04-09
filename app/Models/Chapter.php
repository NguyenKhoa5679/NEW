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
}
