<?php require "layout/header.php"; ?>
<h1>Danh sách Môn Học</h1>
<a href="?c=subject&&a=add" class="btn btn-info">Add</a>
<form action="/" method="GET">
    <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control"
            value="">
        <button class="btn btn-danger">Tìm</button>
    </label>
    <input type="hidden" name ="c" value="subject">
</form>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Mã MH</th>
            <th>Tên</th>
            <th>Số tín chỉ</th>
            <th colspan="2">Tùy Chọn</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt=0; 
    foreach($data as $subject)
    {
        $stt++;
        ?>
        <tr>
            <td><?=$stt?></td>
            <td><?=$subject->id?></td>
            <td><?=$subject->name?></td>
            <td><?=$subject->number_of_credit?></td>
            <td><a href="/?c=subject&&a=edit&&id=<?=$subject->id?>">Sửa</a></td>
            <td><button class="bnt btn-danger btn-sm delete" data-url="?c=subject&&a=delete&&id=<?=$subject->id?>">Xóa</button></td>
        </tr>
        <?php
        
    }
    ?>

    </tbody>
</table>
<div>
    <span>Số lượng:<?=count($data)?></span>
</div>
<?php require "layout/footer.php"; ?>