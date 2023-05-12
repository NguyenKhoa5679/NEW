<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<?php //$books= json_decode(html_entity_decode($this->e($books)))?>

    <main>
        <div class="container page-content">
            <div class="heading-section">
                <h4 class="row">
                    <div class="col-9">
                        <em>Thêm Thông tin Truyện</em>
                        <div class="nav-border" style="width: 15%; height:1px;"></div>
                    </div>
                </h4>


                <div class="container shadow rounded-3 m-3 p-4" style="background: white">
                    <form class="" action="" method="POST" enctype="multipart/form-data">
                        <div class="mx-1 mb-4 row">
                            <label class="form-label h3 fw-bold">
                                Tên truyện
                            </label>
                            <div class="">
                                <input type="text" class="form-control" name="TenTruyen" id="" required>
                            </div>
                        </div>
                        <div class="mx-1 mb-4 row">
                            <label for="themanh" class="form-label h3 fw-bold">
                                Thêm ảnh
                            </label>
                            <div class="">
                                <input class="form-control" type="file" id="Anh" name="Anh">
                            </div>
                        </div>
                        <div class="mx-1 mb-4 row">
                            <label class="form-label h3 fw-bold">
                                Thể loại
                            </label>
                            <div class="">
                                <select class="theLoai form-select" name="theLoai[]" multiple="multiple">
                                    <?php $theloaiList = \App\Models\TheLoai::getListTheLoai();
                                    foreach ($theloaiList as &$theloai) {
                                        ?>
                                        <option
                                            value="<?= $theloai->truyen_theloai ?>"> <?= $theloai->ten_theloai ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="mx-1 mb-4 row">
                            <label for="formFile" class="form-label h3 fw-bold">
                                Tác giả
                            </label>
                            <div class=""
                            ">
                            <input class="form-control" type="text" id="tacgia" name="TacGia">
                        </div>

                </div>
                <div class="mx-1 mb-4 row">
                    <label class="form-label h3 fw-bold">
                        Mô tả
                    </label>
                    <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                              id="moTa"
                                              style="height: 100px" name="moTa"></textarea>
                        <!--                                    <label for="moTa" class="h4 form-label mx-2"> Nhập mô tả</label>-->
                    </div>

                </div>
                <div class="btn-custom-wrap ms-auto me-3" style="height: 47.61px;">
                    <button type="submit" class="btn btn-custom p-1">Thêm truyện</button>
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