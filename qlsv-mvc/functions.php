<?php 
    // chuyển ngày từ chuẩn quốc tế là 2021-6-01 thành chuẩn VN 
    function convertDateFormat($date)
    {
        $timeS = strtotime($date); // chuyển sang giây tính từ ngày 1/1/1970
        $formatDate= date("d/m/Y",$timeS);
        return $formatDate;
    }
    // Chuyển từ số sang gender
    function converGender($gender_values)
    {
        $genderMap = ["Nam","Nữ","Khác"];
        $gender = $genderMap[$gender_values];
        return $gender;
    }
?>