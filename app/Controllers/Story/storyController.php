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

   public function addChapter(){
      $this->sendPage('chapter/addChapter', []);
   }

   public function editChapter(){
      $this->sendPage('chapter/editChapter', []);
   }


}