<?php use App\Models\Book;

$this->layout("layouts/default", ["title" => APPNAME]) ?>


<?php $this->start("page") ?>
<?php
$book = Book::all()->where('truyen_id', $this->e($truyen_id))->first();
?>

    <main>
        <div class="container page-content">
            <div class="heading-section">
                <h4 class="row">
                    <div class="col-9">
                        <em><?= $book->truyen_ten ?></em>
                        <div class="nav-border" style="width: 15%; height:1px;"></div>
                    </div>

<!--                    <div>-->
<!--                        <h4 class="text-center">-->
<!---->
<!--                        </h4>-->
<!--                    </div>-->


                    <div class="container p-5">
                        <form class="" action="/handleCreateChapter" method="POST">
                            <div class="m-1 row border-bottom w-50 m-auto">
                                <input type="text" class="fc-custom text-center border-0 rounded-0 fw-bold"
                                       name="TieuDe" id="" value="Tiêu đề"
                                >
                            </div>
                            <div class="container my-3 mx-5 row">
                               <textarea class="fc-custom border-0" placeholder="Nhập nội dung"
                                         id="floatingTextarea2" name="noiDung"
                                         style="min-height: 500px; height: auto"></textarea>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input hidden="hidden" name="idTruyen" value="<?= $this->e($truyen_id) ?>">
                                <button type="submit" class="  btn btn-custom-wrap fw-bold" style="color:white;">
                                    Lưu nội dung
                                </button>
                            </div>
                        </form>
                    </div>
                </h4>

            </div>
        </div>
    </main>

<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <style>
        .select2-selection__choice__display {
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 1.2rem;
            font-style: unset;
            font-weight: normal;
        }

        .select2-selection__choice {
            background: #F2F2F2 !important;
        }
    </style>
    <style>
        body{
            background-color: #ffffff !important;
        }
    </style>
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.theLoai').select2();
            $('.theLoai').select2({
                placeholder: 'Select an option'
            });
            $('.theLoai').select2({
                matcher: matchStart

            });
        });

        function matchStart(params, data) {
            if ($.trim(params.term) === '') {
                return data;
            }
            if (typeof data.children === 'undefined') {
                return null;
            }
            var filteredChildren = [];
            $.each(data.children, function (idx, child) {
                if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                    filteredChildren.push(child);
                }
            });
            if (filteredChildren.length) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.children = filteredChildren;
                return modifiedData;
            }
            return null;
        }

        document.getElementById("Hienthi").innerHTML = document.getElementsByClassName("theloai");
    </script>
<?php $this->stop() ?>