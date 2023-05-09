<?php use App\Models\Book;
use App\Models\Chapter;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php
$truyen = Book::getBook($this->e($truyen_id));
$chuong = Chapter::getChapter($this->e($chuong_id));
?>

<?php $this->start("page") ?>

    <main class="my-5 py-5">
        <div class="container">
            <div class="text-center">
                <section>
                    <div class="title">
                        <a href="/showBook?<?= $truyen->truyen_ten ?>&id=<?= $truyen->truyen_id ?>">
                            <h1><?= $truyen->truyen_ten ?></h1></a>
                    </div>
                </section>
            </div>
            <div class="chapter_navigator m-auto gap-1">
                <?php
                $previousChapter = Chapter::where('chuong_so', ($chuong->chuong_so - 1))->where('truyen_id', $truyen_id)->first();
                if (is_null($previousChapter)) {
                    ?>
                    <a href="" class="previous btn btn-custom"><i class="fa fa-thin fa-xs fa-chevron-left"></i> Chương
                        trước</a>
                <?php } else {
                    ?>
                    <a
                        href="/showChapter?truyen=<?= $previousChapter->truyen_id ?> &chuong=<?= $previousChapter->chuong_id ?>"
                        class="previous btn btn-custom"><i class="fa fa-thin fa-chevron-left fa-xs"></i> Chương
                        trước</a>
                <?php } ?>


                <button class="dropdown current btn btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false" name="chapter">
                    Chương <?= $chuong->chuong_so ?>
                </button>
                <ul class="dropdown-menu">
                    <?php $chuongList = Chapter::all()->where('truyen_id', $truyen_id);
                    foreach ($chuongList as $item) { ?>
                        <li><a class="dropdown-item"
                               href="/showChapter?truyen=<?= $item->truyen_id ?>&chuong=<?= $item->chuong_id ?>">Chương <?= $item->chuong_so ?></a>
                        </li>
                    <?php } ?>
                </ul>
                <?php
                $nextChapter = Chapter::where('chuong_so', ($chuong->chuong_so + 1))->where('truyen_id', $truyen_id)->first();
                if (is_null($nextChapter)) {
                    ?>
                    <a href="" class="next btn btn-custom">Chương tiếp <i
                            class="fa fa-solid fa-chevron-right" disabled="disable"></i></a>
                <?php } else {
                    ?>
                    <a
                        href="/showChapter?truyen=<?= $nextChapter->truyen_id ?> &chuong=<?= $nextChapter->chuong_id ?>"
                        class="next btn btn-custom">Chương tiếp <i class="fa fa-thin fa-chevron-right fa-xs"></i></a>
                <?php } ?>

            </div>
        </div>
        <div class="container content">
            <?= nl2br($chuong->chuong_noidung) ?>
        </div>

        <div class="container m-auto gap-1">
            <div class="chapter_navigator m-auto">
                <?php
                $previousChapter = Chapter::where('chuong_so', ($chuong->chuong_so - 1))->where('truyen_id', $truyen_id)->first();
                if (is_null($previousChapter)) {
                    ?>
                    <a href="" class="previous btn btn-custom"><i class="fa fa-thin fa-xs fa-chevron-left"></i> Chương
                        trước</a>
                <?php } else {
                    ?>
                    <a
                        href="/showChapter?truyen=<?= $previousChapter->truyen_id ?> &chuong=<?= $previousChapter->chuong_id ?>"
                        class="previous btn btn-custom"><i class="fa fa-thin fa-xs fa-chevron-left"></i> Chương
                        trước</a>
                <?php } ?>


                <button class="dropdown current btn btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false" name="chapter">
                    Chương <?= $chuong->chuong_so ?>
                </button>
                <ul class="dropdown-menu">
                    <?php $chuongList = Chapter::all()->where('truyen_id', $truyen_id);
                    foreach ($chuongList as $item) { ?>
                        <li><a class="dropdown-item"
                               href="/showChapter?truyen=<?= $item->truyen_id ?>&chuong=<?= $item->chuong_id ?>">Chương <?= $item->chuong_so ?></a>
                        </li>
                    <?php } ?>
                </ul>
                <?php
                $nextChapter = Chapter::where('chuong_so', ($chuong->chuong_so + 1))->where('truyen_id', $truyen_id)->first();
                if (is_null($nextChapter)) {
                    ?>
                    <a href="" class="next btn btn-custom">Chương tiếp <i
                            class="fa fa-solid fa-chevron-right" disabled="disable"></i></a>
                <?php } else {
                    ?>
                    <a
                        href="/showChapter?truyen=<?= $nextChapter->truyen_id ?> &chuong=<?= $nextChapter->chuong_id ?>"
                        class="next btn btn-custom">Chương tiếp <i class="fa fa-thin fa-chevron-right fa-xs"></i></a>
                <?php } ?>

            </div>
        </div>

    </main>

<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
    <style>
        .chapter_navigator {
            display: flex;
        }

        .chapter_navigator .previous {
            margin-left: auto;
        }

        .chapter_navigator .current {
            margin: 0px 2px;
        }

        .chapter_navigator .next {
            margin-right: auto;
        }

        .btn-custom {
            /* background:  linear-gradient( 135deg, #F6CEEC 10%, #D939CD 100%); */
            background-color: #5E308C;
            color: white;
            width: fit-content;
        }

        .btn-custom:hover {
            background: #5E308C;
        }

        .content {
            font-size: 1.6rem;
        }
    </style>
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>