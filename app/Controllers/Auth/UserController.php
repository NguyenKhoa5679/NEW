<?php

namespace App\Controllers\Auth;

use App\Models\Comment;
use App\Models\RequireAuthor;
use App\Models\Favorite;
use App\Models\Report;
use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard;
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



    public function profile()
    {
        $idUser = \App\SessionGuard::UserID();
        $this->sendPage('admin/profile', ['iduser' => $idUser]);
    }

    public function myStory()
    {
        $books = Book::getBookIDUser($_SESSION['user_id']);
//         echo  json_encode($books);
        // echo json_encode($_SESSION['user_id']);
        $this->sendPage('admin/myStory', ['books' => json_encode($books)]);
    }

    public function myFavorite()
    {
        $this->sendPage('admin/myFavorite', []);
    }

    public function doiMK()
    {
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $idUser = \App\SessionGuard::UserID();
        $User = \App\Models\User::all()->where('user_id', $idUser)->first();
        if (password_verify($oldPass, $User->password)) {
            User::where('user_id', $idUser)->update(['password' => password_hash($newPass, PASSWORD_ARGON2ID)]);
            echo '<script>alert("Đổi mật khẩu thành công!")</script>';
            $this->sendPage('admin/profile', ['iduser' => $idUser]);
        } else {
            echo '<script>alert("Mật khẩu cũ không đúng! Vui lòng nhập lại!")</script>';
            $this->sendPage('admin/profile', ['iduser' => $idUser]);
        }

    }

    public function newComment()
    {

        if (!SessionGuard::isUserLoggedIn()) {
            $idTruyen = $_POST['idTruyen'];
            $truyen = Book::getBook($idTruyen);
            $url = '/showBook?' . $truyen->truyen_ten . '&id=' . $idTruyen;
            redirect($url, []);
        } else {

            $idTruyen = $_POST['idTruyen'];
            $truyen = Book::getBook($idTruyen);
            $idUser = SessionGuard::UserID();
            $rating = $_POST['rating'];
            $noiDung = $_POST['noiDung'];

            Comment::create([
                'truyen_id' => $idTruyen,
                'user_id' => $idUser,
                'rating' => $rating,
                'noiDung' => $noiDung
            ]);
            $url = '/showBook?' . $truyen->truyen_ten . '&id=' . $idTruyen;
            redirect($url, []);
        }
    }

    public function editComment()
    {
        $idTruyen = $_POST['idTruyen'];
        $truyen = Book::getBook($idTruyen);
        $idUser = SessionGuard::UserID();
        $rating = $_POST['rating'];
        $noiDung = $_POST['noiDung'];
        $idbinhluan = $_POST['idbinhluan'];
//        echo $noiDung;
//        echo "</br>" . $idbinhluan;
        Comment::where('idbinhluan', $idbinhluan)->update([
            'rating' => $rating,
            'noiDung' => $noiDung
        ]);


        $url = '/showBook?' . $truyen->truyen_ten . '&id=' . $idTruyen;
        redirect($url, []);
    }

    public function deleteComment()
    {
        if (!SessionGuard::isUserLoggedIn()) {

            $idTruyen = $_POST['idTruyen'];
            $truyen = Book::getBook($idTruyen);
            $url = '/showBook?' . $truyen->truyen_ten . '&id=' . $idTruyen;
            redirect($url, []);
        } else {
            $idTruyen = $_POST['idTruyen'];
            $truyen = Book::getBook($idTruyen);
            $idbinhluan = $_POST['idbinhluan'];
            Comment::where('idbinhluan', $idbinhluan)->delete();
            $url = '/showBook?' . $truyen->truyen_ten . '&id=' . $idTruyen;
            redirect($url, []);
        }

    }

    public function addFavorite()
    {
        if (!SessionGuard::isUserLoggedIn()) {

            $idTruyen = $_POST['idTruyen'];
            $truyen = Book::getBook($idTruyen);
            $url = '/showBook?' . $truyen->truyen_ten . '&id=' . $idTruyen;

            echo '<script>alert("Bạn cần phải đăng nhập để thực hiện hành động này!")</script>';
            redirect($url, []);
            $this->sendPage($url, []);
        } else {

            $idTruyen = $_POST['idTruyen'];
            $idUser = SessionGuard::UserID();
            Favorite::create([
                'truyen_id' => $idTruyen,
                'user_id' => $idUser
            ]);
            $truyen = Book::getBook($idTruyen);
            $url = '/showBook?' . $truyen->truyen_ten . '&id=' . $idTruyen;
            redirect($url, []);
        }
    }

    public function deleteFavorite()
    {
        $idTruyen = $_POST['idTruyen'];
        $idUser = SessionGuard::UserID();
        Favorite::where('truyen_id', $idTruyen)->where('user_id', $idUser)->delete();
        $truyen = Book::getBook($idTruyen);
        $url = '/showBook?' . $truyen->truyen_ten . '&id=' . $idTruyen;
        redirect($url, []);
    }

    public function addReport()
    {
        $LyDo = $_POST['LyDo'];
        $NoiDung = $_POST['NoiDung'];
        $idTruyen = $_POST['idTruyen'];
        $idUser = SessionGuard::UserID();
        Report::create([
            'truyen_id' => $idTruyen,
            'user_id' => $idUser,
            'LyDo' => $LyDo,
            'NoiDung' => $NoiDung,
            'tinhtrang' => 0
        ]);
        $truyen = Book::getBook($idTruyen);
        $url = '/showBook?' . $truyen->truyen_ten . '&id=' . $idTruyen;
        redirect($url, []);
    }

    public function RequiredAuthor()
    {
        $idUser = SessionGuard::UserID();
        RequireAuthor::create([
            'user_id' => $idUser,
            'tinhtrang' => 0
        ]);
        redirect('/profile', []);

    }

}

?>