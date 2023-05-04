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
        $idUser = \App\SessionGuard::UserID();
        $this->sendPage('admin/profile',['iduser' => $idUser]);
    }

    public function myStory(){
        $books = Book::getBookIDUser($_SESSION['user_id']);
//         echo  json_encode($books);
        // echo json_encode($_SESSION['user_id']);
        $this->sendPage('admin/myStory',['books' => json_encode($books)]);
    }

    public function myFavorite(){
        $this->sendPage('admin/myFavorite',[]);
    }

    public function doiMK(){
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $idUser = \App\SessionGuard::UserID();
        $User = \App\Models\User::all()->where('user_id', $idUser)->first();
        if (password_verify($oldPass, $User->password)){
            User::where('user_id', $idUser)->update(['password' => password_hash($newPass, PASSWORD_ARGON2ID)]);
            echo '<script>alert("Đổi mật khẩu thành công!")</script>';
            $this->sendPage('admin/profile', ['iduser' => $idUser]);
        }
        else{
            echo '<script>alert("Mật khẩu cũ không đúng! Vui lòng nhập lại!")</script>';
            $this->sendPage('admin/profile', ['iduser' => $idUser]);
        }

    }

}

?>