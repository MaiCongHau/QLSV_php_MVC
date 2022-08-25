<?php require "layout/header.php" ?>
<h1>Thêm đăng ký môn học</h1>
<form action="/?c=register&a=save" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="student_id">Tên sinh viên</label>
                    <select class="form-control" name="student_id" id="student_id" required>
                        <option value="">Vui lòng chọn sinh viên</option>
                        <?php
                        foreach ($student as $key => $value) {
                            ?>
                            <option value="<?=$value->id?>"> <?=$value->id?>- <?=$value->name?></option>
                            <?php
                        }  
                        ?>                      
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject_id">Tên môn học</label>
                    <span id="load" class="text-primary"></span>
                    <select class="form-control" name="subject_id" id="subject_id" required>
                        <option value="">Vui lòng chọn môn học</option>
                        <?php
                        foreach ($subject as $key => $value) {
                            ?>
                            <option value="<?=$value->id?>"> <?=$value->id?>- <?=$value->name?></option>
                            <?php
                        }  
                        ?>     
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require "layout/footer.php" ?>