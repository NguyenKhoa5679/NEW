<?php

namespace App\Controllers\Story;

use App\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Chapter;


class storyController extends Controller{
   public function __construct(){
      parent::__construct();
   }

   public function addStory(){
      $this->sendPage('book/addBook', []);
   }

   public function editStory(){
      $this->sendPage('book/editBook', []);
   }

   public function showStory(){
      // Truyền vào id của truyện
      $this->sendPage('book/showBook', []);
   }

   public function deleteStory(){
      // Xóa trong csdl
      $this->sendPage('book/deleteBook', []);
   }

   public function addChapter(){
      $this->sendPage('chapter/addChapter', []);
   }

   public function editChapter(){
      $this->sendPage('chapter/editChapter', []);
   }
   
   public function showChapter(){
      // Truyền vào id của truyện, chương
      $this->sendPage('chapter/showChapter', []);
   }
   
   public function deleteChapter(){
      // Xóa trong csdl
      $this->sendPage('chapter/deleteChapter', []);
   }


}