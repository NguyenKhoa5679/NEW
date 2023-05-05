<?php

namespace App\Controllers\Story;

use App\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Chapter;
use App\SessionGuard;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Capsule\Manager;
use PDOException;
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
        $upload_file = $upload_dir . $tenTruyen . basename($tenTruyen . $_FILES['Anh']['name']);
        move_uploaded_file($_FILES['Anh']['tmp_name'], $upload_file);
        $moTa = $_POST['moTa'];
        $tacGia = $_POST['TacGia'];
        $theLoai_List = $_POST['theLoai'];
        $theLoai = join(', ', $theLoai_List);
        $newBook = Book::create([
            'truyen_ten' => $tenTruyen,
            'truyen_img' => $upload_file,
            'truyen_theloai' => $theLoai,
            'truyen_mota' => $moTa,
            'truyen_tinhtrang' => 'Chưa hoàn thành',
            'tacgia' => $tacGia,
            'truyen_ngaydang' => date("Y-m-d"),
            'iduser' => SessionGuard::UserID()
        ]);


        redirect('/myStory', []);
    }

    public function editStory()
    {
        $idTruyen = $_GET['id'] ?? $_SESSION['truyen_id'];

        $this->sendPage('book/editBook', ['id' => $idTruyen]);
    }

    public function handleEditBook()
    {
        $idTruyen = $_POST['idTruyen'];
        $tenTruyen = $_POST['tenTruyen'];
        $tacgia = $_POST['tacGia'];
        $theLoai_List = $_POST['theLoai'];
        $theLoai = join(', ', $theLoai_List);
        $tinhTrang = $_POST['tinhTrang'];
        $moTa = $_POST['moTa'];
        Book::where('truyen_id', $idTruyen)->update([
            'truyen_ten' => $tenTruyen,
            'TacGia' => $tacgia,
            'truyen_theloai' => $theLoai,
            'truyen_mota' => $moTa,
            'truyen_tinhtrang' => $tinhTrang
        ]);
        redirect('/editBook', ['truyen_id' => $idTruyen]);
    }

    public function showStory()
    {
        // Truyền vào id của truyện
        $this->sendPage('book/showBook', ['id' => $_GET['id']]);
    }

    public function deleteStory()
    {
        try{

        }
        catch (PDOException $ex){

    }
        $this->sendPage('book/deleteBook', []);
    }

    public function addChapter()
    {
        $idTruyen = $_POST['idTruyen']?? $_SESSION['truyen_id'];
        $this->sendPage('chapter/addChapter', ['truyen_id' => $idTruyen]);
    }

    public function handleCreateChapter()
    {
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
            'truyen_id' => $idtruyen
        ]);
        redirect('/editBook', ['truyen_id' => $idtruyen]);

    }

    public function editChapter()
    {
        $idChuong = $_POST['idChuong'];
        $this->sendPage('chapter/editChapter', ['chuong_id' => $idChuong]);
    }

    public function handleEditChapter()
    {
        $idChuong = $_POST['idChuong'];
        $noidung = $_POST['noiDung'];
        $tieude = $_POST['TieuDe'];
        $chapter = Chapter::where('chuong_id', $idChuong)->update([
            'chuong_ten' => $tieude,
            'chuong_noidung' => $noidung
        ]);
        redirect('/editBook', ['truyen_id' => Chapter::getChapter($idChuong)->truyen_id]);

    }

    public function showChapter()
    {
        //TODO: Truyền vào id của truyện, chương
        $this->sendPage('chapter/showChapter', []);
    }

    public function deleteChapter()
    {
        $idChuong = $_POST['idChuong'];
        $Chapter = Chapter::all()->where('chuong_id', $idChuong)->first();
        $chuongSo = $Chapter->chuong_so;
        $idTruyen = $Chapter->truyen_id;
        echo 'Hello';
        try {
            Manager::beginTransaction();
            Chapter::where('chuong_id', $idChuong)->delete();
            Manager::update('UPDATE CHUONG SET CHUONG_SO = CHUONG_SO-1 WHERE TRUYEN_ID = :idTruyen AND CHUONG_SO > :chuongSo', [
                'idTruyen' => $idTruyen,
                'chuongSo' => $chuongSo
            ]);
            Manager::commit();
        } catch (PDOException $ex) {
            echo $ex;
            Manager::rollBack();
        }
        redirect('/editBook', ['truyen_id' => $idTruyen]);
    }

    public function showTheLoai()
    {
        $this->sendPage('admin/theLoai', ['theLoai' => $_GET['TL']]);
    }


}