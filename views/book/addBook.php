<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<?php //$books= json_decode(html_entity_decode($this->e($books)))?>

<main>
    <div class="container page-content">
        <div class="heading-section">
            <h4 class="row">
                <div class="col-9">
                    <em>Thêm Chương</em>
                    <div class="nav-border" style="width: 15%; height:1px;"></div>
                </div>


                <form class="" action="">
                    <div class="m-1 row">
                        <label class="col-sm-2 form-label h4">
                            Tên truyện
                        </label>
                        <div class="col-sm-10 pt-2">
                            <input type="text" class="form-control" name="TenTruyen" id="">
                        </div>
                    </div>
                    <div class="m-1  row">
                        <label for="themanh" class="col-sm-2 form-label h4">Thêm ảnh</label>
                        <div class="col-sm-10 pt-2">
                            <input class="form-control" type="file" id="Anh" name="Anh">
                        </div>

                    </div>
                    <div class="m-1  row">
                        <label class="col-sm-2 form-label h4">Thể loại</label>
                        <div class="col-sm-10 pt-2">
                            <select class="theLoai form-select" name="theLoai[]" multiple="multiple">
                                <option value="abc">Alabama</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                    </div>
                    <div class="m-1  row">
                        <label for="formFile" class="col-sm-2 form-label h4">Tác giả</label>
                        <div class="col-sm-10 pt-2">
                            <input class="form-control" type="text" id="tacgia" name="TacGia">
                        </div>

                    </div>
                    <div class=" m-1  row">
                        <label class="col-sm-2 form-label h4">Mô tả</label>
                        <div class="form-floating col-sm-10 pt-2">
                            <textarea class="form-control" placeholder="Leave a comment here" id="moTa"
                                        style="" name="moTa"></textarea>
                            <label for="moTa" class="h4 form-label mx-2"> Nhập mô tả</label>
                        </div>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary bg-custom">Thêm truyện</button>
                    </div>

                </form>
            </h4>

        </div>
    </div>
</main>

<?php $this->stop() ?>

<?php $this->start("page_specific_css") ?>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <style>
        .select2-selection__choice__display{
            font-family: 'Darker Grotesque', sans-serif;
            font-size: 1.2rem;
            font-style: unset;
            font-weight: normal;
        }
        .select2-selection__choice{
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