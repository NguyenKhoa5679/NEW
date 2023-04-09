<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   protected $table = 'truyen';
   protected $fillable = [
      'truyen_id', 'truyen_ma','truyen_ten', 'truyen_img',
      'truyen_theloai', 'truyen_mota', 'truyen_ngaydang',
      'truyen_sochuong', 'truyen_tinhtrang'
   ];
}
