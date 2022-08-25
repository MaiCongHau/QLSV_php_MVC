<?php 
    class RegisterController{
        function list()
        {
            $registerRepository = new RegisterRepository();
            $search = "";
            if(!empty($_GET["search"]))
            {
                $search=$_GET["search"];
                $registers = $registerRepository->getBysearch($search);
            }else{
                $registers =  $registerRepository->getALL(); 
            }
            require "view/register/list.php";   
        }
        function add()
        {
            $studentRepository = new StudentRepository();
            $student= $studentRepository->getALL();
            $subjectRepository = new SubjectRepository();
            $subject=$subjectRepository->getALL();
            require "view/register/add.php";
        }
        function save()
        {
           $data = $_POST;
           $registerRepository = new RegisterRepository();
           session_start();
           if($registerRepository->save($data))
             {
                $_SESSION["success"]="Đã thêm sinh viên vào môn học thành công";
             }
            else{
                $_SESSION["error"]=$registerRepository->error;
            }
            header("location:/?c=register");
        }
        function edit()
        {
            $register_id = $_GET["id"];
            $registerRepository = new RegisterRepository();
            $register = $registerRepository->edit($register_id );
            require "view/register/edit.php";
        }
        function update()
        {
            $data = $_POST;
            $registerRepository = new RegisterRepository();
            session_start();
            if($registerRepository->update($data))
             {
                $_SESSION["success"]="Đã thay đổi sinh viên thành công";
             }
            else{
                $_SESSION["error"]=$registerRepository->error;
            }
            header("location:/?c=register");
        }
        function delete()
        {
            $id = $_GET["id"];
            $registerRepository = new RegisterRepository();
            session_start();
            if($registerRepository->delete($id))
             {
                $_SESSION["success"]="Đã xóa sinh viên thành công";
             }
            else{
                $_SESSION["error"]=$registerRepository->error;
            }
            header("location:/?c=register");
        }
    }
?>