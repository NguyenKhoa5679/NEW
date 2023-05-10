<?php use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Capsule\Manager;

$this->layout("layouts/adminLayout", ["title" => APPNAME]) ?>

<?php
$baoCaoList = Manager::select("SELECT * FROM BAOCAO ORDER BY tinhtrang asc");
?>
<?php $this->start("page") ?>


    <div class="p-3 fs-3 fw-bold">

        Báo cáo truyện
    </div>

    <div>
        <table class="table table-striped" id="table1">
            <thead>
            <tr>
                <th>Người báo cáo</th>
                <th>Truyện báo cáo</th>
                <th>Lý do</th>
                <th>Nội dung</th>
                <th>Tình trạng</th>
                <th>Xử lý</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($baoCaoList as $item) {
                $truyen = Book::getBook($item->truyen_id);
                $user = User::getUserbyIDUser($item->user_id)
                ?>
                <tr>
                    <td><?= $user->username ?></td>
                    <td>
                        <a href="/showBook?<?= $truyen->truyen_ten ?>&id=<?= $truyen->truyen_id ?>"> <?= $truyen->truyen_ten ?></a>
                    </td>
                    <td><?= $item->LyDo ?></td>
                    <td><?= $item->NoiDung ?></td>
                    <td>
                        <?php
                        if ($item->tinhtrang) {
                            ?>
                            <div class="badge text-bg-success">Đã xử lý</div>
                            <?php
                        } else {
                            ?>
                            <div class="badge text-bg-warning">Chưa xử lý</div>
                            <?php
                        }
                        ?>
                    </td>

                    <td>
                        <form action="/handleReport" method="post">
                            <input value="<?= $item->idbaocao ?>" name="idBaocao" hidden>
                            <button type="submit" class="btn">
                                <i class="fa fa-custom fa-solid fa-check"></i>
                            </button>
                        </form>

                    </td>

                    <td>
                        <form action="/deleteReport" method="post">
                            <input value="<?= $item->idbaocao ?>" name="idBaocao" hidden>
                            <button type="submit" class="btn">
                                <i class="fa fa-custom fa-solid fa-xmark"></i>
                            </button>
                        </form>

                    </td>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>


<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>