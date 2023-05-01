<?php

namespace App\Controllers\Story;

use App\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Chapter;
use App\SessionGuard;


class storyController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addStory()
    {
        $this->sendPage('book/addBook', []);
    }

    public function createNewStory()
    {
        echo 'Thanh Cong';
        $upload_dir = 'img/uploads/';
        $tenTruyen = $_POST["TenTruyen"];
        $upload_file = $upload_dir . $tenTruyen . basename($tenTruyen.$_FILES['Anh']['name']);
        move_uploaded_file($_FILES['Anh']['tmp_name'], $upload_file);
        $moTa = $_POST['moTa'];
        $tacGia = $_POST['TacGia'];
        $theLoai_List = $_POST['theLoai'];
        $theLoai = join(', ', $theLoai_List);
//        echo $theLoai;

        $newBook = Book::create([
            'truyen_ten' => $tenTruyen,
            'truyen_img' => $upload_file,
            'truyen_theloai' => $theLoai,
            'truyen_mota' => $moTa,
            'truyen_sochuong' => 0,
            'truyen_tinhtrang' => 'Chưa hoàn thành',
            'tacgia' => $tacGia,
            'truyen_ngaydang' => date("Y-m-d"),
            'iduser' => SessionGuard::UserID()
        ]);
//        echo $tenTruyen;
//        echo $theLoai[1];
//        echo $moTa;
//        echo $tacGia;
//        echo SessionGuard::UserID();
//        echo $_FILES["Anh"]["name"];
//        $this->sendPage('/home', []);
        redirect('/home', []);
   }

    public function editStory()
    {
        $this->sendPage('book/editBook', []);
    }

    public function showStory()
    {
        // Truyền vào id của truyện
        $this->sendPage('book/showBook', ['id' => $_GET['id']]);
    }

    public function deleteStory()
    {
        // Xóa trong csdl
        $this->sendPage('book/deleteBook', []);
    }

    public function addChapter()
    {
        $this->sendPage('chapter/addChapter', []);
    }

    public function editChapter()
    {
        $this->sendPage('chapter/editChapter', []);
    }

    public function showChapter()
    {
        // Truyền vào id của truyện, chương
        $this->sendPage('chapter/showChapter', []);
    }

    public function deleteChapter()
    {
        // Xóa trong csdl
        $this->sendPage('chapter/deleteChapter', []);
    }


}