<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard as Guard;
use Illuminate\Database\Capsule\Manager;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Theloai;

use function PHPSTORM_META\type;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function admin(){
        $this->sendPage('admin/admin',[]);
    }

    public function profile(){
        $this->sendPage('admin/profile',[]);
    }

    public function myStory(){
        $books = Book::getBookID($_SESSION['user_id']);
//         echo  json_encode($books);
        // echo json_encode($_SESSION['user_id']);
        $this->sendPage('admin/myStory',['books' => json_encode($books)]);
    }

    public function myFavorite(){
        $this->sendPage('admin/myFavorite',[]);
    }
}

?>