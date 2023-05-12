<?php use App\Models\Book;
use App\Models\TheLoai;
use Illuminate\Database\Capsule\Manager;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php
$popularChapter = Manager::select("SELECT truyen_id FROM CHUONG  GROUP BY TRUYEN_ID ORDER BY SUM(LUOTXEM) desc LIMIT 6;");
$newChapter = Manager::select("SELECT * FROM chuong c INNER JOIN ( SELECT truyen_id, MAX(chuong_id) AS max_chuong_id FROM chuong GROUP BY truyen_id) m ON c.truyen_id = m.truyen_id AND c.chuong_id = m.max_chuong_id Order by created_at  desc LIMIT 10;");
?>
<?php $this->start("page") ?>

    <main>
        <div class="container">
            <div class="page-content">
                <!-- mostpopular -->
                <div class="most-popular border shadow" style="background: white">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4>
                                    <em>Phổ biến hiện tại</em>
                                </h4>
                            </div>

                            <div class="row px-1">

                                <?php

                                foreach ($popularChapter as $item) {
                                    
                                    $book = Book::getBook($item->truyen_id);


                                    ?>

                                    <div class="col-lg-2 col-sm-6">
                                        <a href="/showBook?<?= $book->truyen_ten ?>&id=<?= $book->truyen_id ?>">
                                            <div class="rounded-3 shadow hover card mb-4 ">
                                                <img class="card-img-top w-100 h-50 "
                                                     style="min-height: 284px; max-height: 284px; object-fit: cover;width: 182px"
                                                     src="<?= $book->truyen_img ?>"
                                                     alt="">
                                                <div class="card-body">
                                                    <h4 class="card-text ">
                                                        <div class="text-truncate card-title"
                                                             style="max-width:90%"><?= $book->truyen_ten ?>
                                                        </div>
                                                        <span class="fs-6"><?= $book->TacGia ?></span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>


                                <?php

                                } ?>


                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- truyen moi cap nhat -->
            <div class="container most-popular border shadow mb-5" style="background: white">
                <div class="table-responsive">
                    <div class="heading-section">
                        <h4>
                            <em>Vừa cập nhật</em>
                        </h4>
                    </div>
                    <table class="table
                    table-borderless
                    align-middle">
                        <thead class="table-light">

                        <tr>
                            <th style="width:40%">Tên truyện</th>
                            <th style="width:20%">Thể loại</th>
                            <th style="width:20%" class="text-center">Chương</th>
                            <th style="width:20%" class="text-center">Cập nhật</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        <tr class="">
                            <?php
                            foreach ($newChapter

                            as $chapter) {
                            $book = Book::getBook($chapter->truyen_id);


                            ?>

                            <td scope="row" class="">
                                <div class="text-truncate" style="max-width:80%">
                                    <a href="/showBook?<?= $book->truyen_ten ?>&id=<?= $book->truyen_id ?>">
                                        <?= $book->truyen_ten ?>
                                    </a>
                                </div>


                            </td>
                            <td class="d-flex">
                                <div class="text-truncate" style="max-width:80%">
                                <?php $theLoaiList = explode(", ", $book->truyen_theloai);
                                $TruyenTheLoai = [];
                                foreach ($theLoaiList as &$value) {
                                    $theLoai = TheLoai::getTheLoai(intval($value));
                                    array_push($TruyenTheLoai, $theLoai->ten_theloai);
                                }
                                echo join(', ', $TruyenTheLoai);
                                ?>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href=<?= "/showChapter?truyen={$book->truyen_id}&chuong={$chapter->chuong_id}" ?>>
                                    <?= 'Chương ' . $chapter->chuong_so ?>
                                </a>
                            </td>
                            <td class="text-center">
                                <?php
                                $updated_at = DateTime::createFromFormat('Y-m-d H:i:s', $chapter->created_at);
                                $now = new DateTime();
                                $interval = $updated_at->diff($now);
                                $hours = $interval->h + ($interval->days * 24);
                                if ($hours < 24)
                                    echo $hours . ' giờ trước';
                                else
                                    echo intval($hours / 24) . ' ngày trước';
                                ?>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div>

        </div>

    </main>
<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>