<?php 
    class StudentController{
        function list()
        {
            $StudentRepository = new StudentRepository();
            $search = "";
            if(!empty($_GET["search"]))
            {
                $search=$_GET["search"];
                $students = $StudentRepository->getBysearch($search);
            }else{
                $students =  $StudentRepository->getALL(); 
            }
            require "view/student/list.php";   
        }
        function add()
        {
            require "view/student/add.php";
        }
        function save()
        {
           $data = $_POST;
           $studentRepository = new StudentRepository();
           session_start();
           if($studentRepository->save($data))
             {
                $_SESSION["success"]="Đã thêm sinh viên thành công";
             }
            else{
                $_SESSION["error"]=$studentRepository->error;
            }
            header("location:/");
        }
        function edit()
        {
            $id = $_GET["id"];
            $studentRepository = new StudentRepository();
            $student = $studentRepository->edit($id);
            require "view/student/edit.php";
        }
        function update()
        {
            $data = $_POST;
            $studentRepository = new StudentRepository();
            session_start();
            if($studentRepository->update($data))
             {
                $_SESSION["success"]="Đã thay đổi sinh viên thành công";
             }
            else{
                $_SESSION["error"]=$studentRepository->error;
            }
            header("location:/");
        }
        function delete()
        {
            $id = $_GET["id"];
            $studentRepository = new StudentRepository();
            session_start();
            if($studentRepository->delete($id))
             {
                $_SESSION["success"]="Đã xóa sinh viên thành công";
             }
            else{
                $_SESSION["error"]=$studentRepository->error;
            }
            header("location:/");
        }
    }
?>