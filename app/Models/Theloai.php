<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class theloai extends Model{
   protected $table = 'theloai';
   protected $fillable = ['truyen_theloai', 'ten_theloai'];
   
}