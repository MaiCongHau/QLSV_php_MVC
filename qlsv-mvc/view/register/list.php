<?php require "layout/header.php" ?>
<h1>Danh sách sinh viên đăng ký môn học</h1>
<a href="/?c=register&a=add" class="btn btn-info">Add</a>
<form action="/" method="GET">
    <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control"
            value="">
        <button class="btn btn-danger">Tìm</button>
    </label>
    <input type="hidden" name="c" value="register">
</form>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Mã SV</th>
            <th>Tên SV</th>
            <th>Mã MH</th>
            <th>Tên MH</th>
            <th>Điểm</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php $order=1;?>
    <?php foreach($registers as $register) : ?>
        <tr>
            <td><?=$order++?></td>
            <td><?=$register->student_id?></td>
            <td><?=$register->student_name?></td>
            <td><?=$register->subject_id?></td>
            <td><?=$register->subject_name?></td>
            <td><?=$register->score?></td>
            <td> <a href="/?c=register&a=edit&id=<?=$register->id?>">Cập nhật điểm</a> </td>
            <td><button class="bnt btn-danger btn-small delete" data-url ="/?c=register&a=delete&id=<?= $register->id ?>">Xóa</button></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div>
    <span>Số lượng: <?=count($registers)?></span>
</div>
<?php require "layout/footer.php" ?>