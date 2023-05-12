<?php use App\Models\Book;
use App\Models\TheLoai;

$this->layout("layouts/adminLayout", ["title" => APPNAME]) ?>

<?php
$theLoaiList = TheLoai::all();
?>

<?php $this->start("page") ?>


    <div class="p-3 fs-3 fw-bold">
        Quản lý danh mục thể loại
    </div>

    <div class="">
        <div class="row">
            <button type="submit" class="btn ms-5 text-center fw-bold fs-5 bg-custom"
                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                    style="-webkit-background-clip: text; -webkit-text-fill-color: transparent; width: fit-content">
                <i class="fa-solid fa-plus fa-xs"></i> Thêm thể loại
            </button>
            </form>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Thêm thể loại</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/addCategory" id="addCategory">
                            <label class="fw-bold form-label">Tên thể loại</label>
                            <input class="form-control" type="text" name="tenTheLoai" placeholder="" required>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" form="addCategory" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 m-auto w-75">
    <div class="row">
        <div class="col-1 p-3 fw-bold text-center border-bottom bg-white">STT</div>
        <div class="col p-3 fw-bold text-center border-bottom bg-white">Tên thể loại</div>
        <div class="col p-3 fw-bold text-center border-bottom bg-white">Số lượng truyện</div>
        <div class="col p-3 fw-bold text-center border-bottom bg-white">Chỉnh sửa</div>
    </div>

<?php
$count = 0;
foreach ($theLoaiList as $theloai) {
    $count += 1;
    $SoTruyen = Book::where('truyen_theloai', 'LIKE', '%'.$theloai->truyen_theloai.'%')->count();
    if ($count % 2 == 0) {
        ?>
        <div class="row">
            <div class="col-1 p-3 text-center fw-bold border-bottom bg-white"><?= $count ?></div>
            <div class="col p-3 text-center border-bottom bg-white"><a
                    href="/theLoai?TL=<?= $theloai->ten_theloai ?>"><?= $theloai->ten_theloai ?></a></div>
            <div class="col p-3 text-center border-bottom bg-white"><?= $SoTruyen ?></div>
            <div class="col p-3 text-center border-bottom bg-white">
                <div class="">
                    <button type="submit" class="btn text-center fw-bold fs-5 bg-custom"
                            data-bs-toggle="modal" data-bs-target="#<?= $theloai->truyen_theloai ?>"
                            style="-webkit-background-clip: text; -webkit-text-fill-color: transparent; width: fit-content">
                        <i class="fa fa-custom fa-regular fa-pen-to-square"></i>
                    </button>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-1 p-3 text-center fw-bold border-bottom"><?= $count ?></div>
            <div class="col p-3 text-center border-bottom"><a
                    href="/theLoai?TL=<?= $theloai->ten_theloai ?>"><?= $theloai->ten_theloai ?></a></div>
            <div class="col p-3 text-center border-bottom"><?= $SoTruyen ?></div>
            <div class="col p-3 text-center border-bottom">
                <div class="">
                    <button type="submit" class="btn text-center fw-bold fs-5 bg-custom"
                            data-bs-toggle="modal" data-bs-target="#<?= $theloai->truyen_theloai ?>"
                            style="-webkit-background-clip: text; -webkit-text-fill-color: transparent; width: fit-content">
                        <i class="fa fa-custom fa-regular fa-pen-to-square"></i>
                    </button>

                </div>
            </div>
        </div>
    <?php }
    ?>
    <div class="modal fade" id="<?= $theloai->truyen_theloai ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Sửa thể loại</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/editCategory" id="editCategory<?= $theloai->truyen_theloai ?>">
                        <label class="fw-bold form-label text-start">Tên thể loại</label>
                        <input class="form-control" type="text" name="tenTheLoai" value="<?= $theloai->ten_theloai ?>"
                               required>
                        <input value="<?=$theloai->truyen_theloai?>" name="idTheloai" hidden="hidden">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" form="editCategory<?= $theloai->truyen_theloai ?>" class="btn btn-primary">Sửa</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    </div>


    <?php $this->stop() ?>

    <?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
    <?php $this->stop() ?>

    <?php $this->start("page_specific_js") ?>

    <?php $this->stop() ?>