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

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function admin()
    {
        $this->sendPage('admin/admin', []);
    }

    public function adminUsers()
    {
        $this->sendPage('admin/ad_Users', []);
    }

    public function adminBooks()
    {
        $this->sendPage('admin/ad_Books', []);
    }

    public function adminCategories()
    {
        $this->sendPage('admin/ad_Categories', []);
    }

    public function adminAuthors()
    {
        $this->sendPage('admin/ad_Authors', []);
    }

    public function adminNotification()
    {
        $this->sendPage('admin/ad_Notification', []);
    }

    public function deleteUser(){
        $idUser = $_POST['idUser'];
        try{
            Manager::beginTransaction();

            Report::where('user_id', $idUser)->delete();
            Favorite::where('user_id', $idUser)->delete();
            Comment::where('user_id', $idUser)->delete();
            RequireAuthor::where('user_id', $idUser)->delete();
            $truyenList = Book::all()->where('iduser', $idUser);

            foreach ($truyenList as $item) {
                Report::where('truyen_id', $item->truyen_id)->delete();
                Comment::where('truyen_id', $item->truyen_id)->delete();
                Favorite::where('truyen_id', $item->truyen_id)->delete();
                Chapter::where('truyen_id', $item->truyen_id)->delete();
                Book::where('truyen_id', $item->truyen_id)->delete();
            }
            User::where('user_id', $idUser)->delete();
            Manager::commit();
        }
        catch (\PDOException $e){
            Manager::rollback();
        }
        redirect('/admin/Users');
    }

    public function updatePermission(){
        $idUser = $_POST['idUser'];
        try{
            Manager::beginTransaction();

            User::where('user_id', $idUser)->update(['role' => 3]);
            RequireAuthor::where('user_id', $idUser)->update(['tinhtrang' => 1]);

            Manager::commit();
        }
        catch (\PDOException $e){
            Manager::rollback();
        }
        redirect('/admin/Authors');
    }

    public function deniedPermission(){
        $idUser = $_POST['idUser'];
        try{
            Manager::beginTransaction();

            RequireAuthor::where('user_id', $idUser)->delete();

            Manager::commit();
        }
        catch (\PDOException $e){
            Manager::rollback();
        }
        redirect('/admin/Authors');
    }

    public function handleReport(){
        $idBaocao = $_POST['idBaocao'];
        Report::where('idbaocao', $idBaocao)->update(['tinhtrang'=>1]);
        redirect('/admin/Notification');
    }

    public function deleteReport(){
        $idBaocao = $_POST['idBaocao'];
        Report::where('idbaocao', $idBaocao)->delete();
        redirect('/admin/Notification');
    }

    public function deleteBookbyAdmin(){
        $idTruyen = $_POST['idTruyen'];
        echo $idTruyen;
        try {
            Manager::beginTransaction();
            Chapter::where('truyen_id', $idTruyen)->delete();
            Favorite::where('truyen_id', $idTruyen)->delete();
            Comment::where('truyen_id', $idTruyen)->delete();
            Report::where('truyen_id', $idTruyen)->delete();
            $img_path = Book::getBook($idTruyen)->truyen_img;
            unlink($img_path);
            Book::where('truyen_id', $idTruyen)->delete();
            Manager::commit();
        } catch (PDOException $ex) {
            Manager::rollBack();
        }
        redirect('/admin/Books');
    }

    public function addCategory(){
        $tenTheLoai = $_POST['tenTheLoai'];
        Theloai::create([
            'ten_theloai'=>$tenTheLoai
        ]);
        redirect('/admin/Categories');
    }

    public function editCategory(){
        $tenTheLoai = $_POST['tenTheLoai'];
        $idTheloai = $_POST['idTheloai'];
        echo $idTheloai.'    ';
        echo $tenTheLoai;
        Theloai::where('truyen_theloai', $idTheloai)->update([
            'ten_theloai'=>$tenTheLoai
        ]);
        redirect('/admin/Categories');
    }
}
