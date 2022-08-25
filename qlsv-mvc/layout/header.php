<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="public/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/vendor/fontawesome-free-5.15.1-web/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
	<?php global $c;?>
    <div class="container" style="margin-top:20px;">
        <a href="/" class=" <?=$c == "student"? 'active':""?> btn btn-info" >Students</a>
        <a href="/?c=subject" class=" <?=$c == "subject"?"active":""?> btn btn-info" >Subject</a>
        <a href="/?c=register" class=" <?=$c == "register"?"active":""?> btn btn-info" >Register</a>
        <?php
			session_start();
			$message = null;
			if(!empty($_SESSION["success"]))// phải có thằng empty này
			{
				$message = $_SESSION["success"];
				$alert_class = "alert-success";
				// xóa phần tử dựa vào key, dùng để khi reload trang web thì phần hiển thị sẽ mất 
				unset($_SESSION["success"]);
			} else if (!empty($_SESSION["error"]))
			{
				$message = $_SESSION["error"];
				$alert_class = "alert-danger";
				// xóa phần tử dựa vào key, dùng để khi reload trang web thì phần hiển thị sẽ mất 
				unset($_SESSION["error"]);
			}
			if($message)
			{
			?>
        <div class="alert <?= $alert_class ?> mt-4">
            <?=$message;?>
        </div>
        <?php
			}
			?>