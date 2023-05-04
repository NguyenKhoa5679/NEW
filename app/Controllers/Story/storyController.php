<?php

namespace App\Controllers\Story;

use App\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Chapter;
use App\SessionGuard;
use function MongoDB\BSON\toJSON;


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
        $idTruyen = $_GET['id']?? $_SESSION['truyen_id'];

        $this->sendPage('book/editBook', ['id' => $idTruyen]);
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
        $idTruyen = $_POST['idTruyen'];
        $this->sendPage('chapter/addChapter', ['truyen_id' =>$idTruyen]);
    }

    public function handleCreateChapter(){
        $idtruyen = $_POST['idTruyen'];
        $chuong_so = Chapter::countChapter($idtruyen) + 1;
        $TieuDe = $_POST['TieuDe'];
        $NoiDung = $_POST['noiDung'];
        $luotxem = 0;
        Chapter::create([
            'chuong_so' => $chuong_so,
            'chuong_ten' => $TieuDe,
            'chuong_noidung' => $NoiDung,
            'luotxem' => $luotxem,
            'truyen_id' =>$idtruyen
        ]);
        redirect('/editBook', ['truyen_id'=>$idtruyen]);

    }

    public function editChapter()
    {
        $idChuong = $_POST['idChuong'];
        $this->sendPage('chapter/editChapter', ['chuong_id' => $idChuong]);
    }

    public function handleEditChapter(){
        $idChuong = $_POST['idChuong'];
        $noidung = $_POST['noiDung'];
        $tieude = $_POST['TieuDe'];
        $chapter = Chapter::where('chuong_id', $idChuong)->update([
            'chuong_ten' => $tieude,
            'chuong_noidung' =>$noidung
        ]);
        redirect('/editBook', ['truyen_id' => Chapter::getChapter($idChuong)->truyen_id]);

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

    public function showTheLoai()
    {
//        echo $_GET['TL'].'\n';
//        $IDTheLoai = \App\Models\TheLoai::getIDTheLoai($_GET['TL'])->truyen_theloai;
//        echo \App\Models\Book::getBookByTheLoai($IDTheLoai);
        $this->sendPage('admin/theLoai', ['theLoai' => $_GET['TL']]);
    }


}