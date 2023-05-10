<?php $this->layout("layouts/adminLayout", ["title" => APPNAME]) ?>

<?php
$Books = \App\Models\Book::all();
?>

<?php $this->start("page") ?>


    <div class="p-3 fs-3 fw-bold">
        Quản lý truyện
    </div>

    <table class="table table-striped" id="table1">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên truyện</th>
            <th>Tác giả</th>
            <th>Thể loại</th>
            <th>Số chương</th>
            <th>Tình trạng</th>
            <th>Người đăng</th>
            <th>Ngày đăng</th>
            <th>Tùy chỉnh</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $count = 0;
        foreach ($Books as $book){
            $count+= 1;

        ?>
        <tr>
            <td>
                <?=$count?>
            </td>
            <td class="text-truncate">
                <?=$book->truyen_ten?>
            </td>
            <td>
                <?= $book->TacGia ?>
            </td>
            <td>
                <?php $theLoaiList = explode(", ", $book->truyen_theloai);
                $TruyenTheLoai = [];
                foreach ($theLoaiList as &$value) {
                    $theLoai = \App\Models\TheLoai::getTheLoai(intval($value));
                    array_push($TruyenTheLoai, $theLoai->ten_theloai);
                }
                echo join(', ', $TruyenTheLoai);
                ?>
            </td>
            <td>
                <?php
                $soChuong = \App\Models\Chapter::all()->where('truyen_id', $book->truyen_id)->count();
                echo $soChuong;
                ?>
            </td>
            <td>
                <?= $book->truyen_tinhtrang ?>
            </td>

            <td>
                <?php
                $user = \App\Models\User::getUserbyIDUser($book->iduser);
                echo $user->username;
                ?>
            </td>
            <td>
                <?= date_format($date = $book->created_at,'Y -m -d') ?>
            </td>

            <td><a href="">Sửa xóa</a></td>
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