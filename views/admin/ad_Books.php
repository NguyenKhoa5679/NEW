<?php $this->layout("layouts/adminLayout", ["title" => APPNAME]) ?>

<?php
$Books = \App\Models\Book::all();
?>

<?php $this->start("page") ?>


    <div class="p-3 fs-3 fw-bold">
        Quản lý truyện
    </div>

    <table class="table table-striped m-1" id="table1">
        <thead>
        <tr class="row">
            <th class="col">STT</th>
            <th class="col-3">Tên truyện</th>
            <th class="col">Tác giả</th>
            <th class="col">Thể loại</th>
            <th class="col">Số chương</th>
            <th class="col">Tình trạng</th>
            <th class="col">Người đăng</th>
            <th class="col">Ngày đăng</th>
            <th class="col">Xóa</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $count = 0;
        foreach ($Books as $book){
            $count+= 1;

        ?>
        <tr class="row">
            <td class="col">
                <?=$count?>
            </td>
            <td class="text-truncate col-3" >
                <a href="/showBook?<?= $book->truyen_ten?>&id=<?=$book->truyen_id?>"><?=$book->truyen_ten?></a>
            </td>
            <td class="col text-truncate">

                <?= $book->TacGia ?>
            </td>
            <td class="col text-truncate ">
                <?php $theLoaiList = explode(", ", $book->truyen_theloai);
                $TruyenTheLoai = [];
                foreach ($theLoaiList as &$value) {
                    $theLoai = \App\Models\TheLoai::getTheLoai(intval($value));
                    array_push($TruyenTheLoai, $theLoai->ten_theloai);
                }
                echo join(', ', $TruyenTheLoai);
                ?>
            </td>
            <td class="col">
                <?php
                $soChuong = \App\Models\Chapter::all()->where('truyen_id', $book->truyen_id)->count();
                echo $soChuong;
                ?>
            </td>
            <td class="col text-truncate">
                <?= $book->truyen_tinhtrang ?>
            </td>

            <td class="col">
                <?php
                $user = \App\Models\User::getUserbyIDUser($book->iduser);
                echo $user->username;
                ?>
            </td>
            <td class="col">
                <?= date_format($date = $book->created_at,'Y -m -d') ?>
            </td>

            <td class="col">
                <form action="/deleteBookbyAdmin" method="post">
                    <input value="<?= $book->truyen_id ?>" name="idTruyen" hidden>
                    <button type="submit" class="btn">
                        <i class="fa fa-custom fa-solid fa-xmark"></i>
                    </button>
                </form>
            </td>
        </tr>
            <?php } ?>


        </tbody>
    </table>


<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>