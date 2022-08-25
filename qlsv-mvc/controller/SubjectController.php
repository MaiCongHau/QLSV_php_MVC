<?php 
 class SubjectController{
    function list()
    {   
        $search="";
        $subjectRepository = new SubjectRepository();
        if(!empty($_GET["search"]))
        {
            $search = $_GET["search"];
            $data = $subjectRepository->getbySearch($search);
        }
        else
        {
            $data = $subjectRepository->getALL();
        }
        require "view/subject/list.php";

    }
    function add()
    {
        require "view/subject/add.php";
        
    }
    function save()
    {
        $data = $_POST;
        $subjectRepository = new SubjectRepository();
        $save = $subjectRepository->save($data);
        session_start();
        if($save)
        {
            $_SESSION["success"]="Đã thêm môn học thành công";
        }else{
            $_SESSION["error"]="Đã thêm môn học thất bại" . $subjectRepository->$error ;
        }
        header("location:/?c=subject");
    }
    function edit()
    {
        $id = $_GET["id"];
        $subjectRepository = new SubjectRepository();
        $conn = "id=$id";
        $save = $subjectRepository->fetch($conn);
        $subject = current($save);
        require "view/subject/edit.php";
    }
    function update()
    {
        $data = $_POST;
        $subjectRepository = new SubjectRepository();
        $update = $subjectRepository->update($data);
        session_start();
        if($update)
        {
            $_SESSION["success"]="Đã update thành công";
        }else{
            $_SESSION["error"]="Đã update thất bại" . $subjectRepository->$error ;
        }
        header("location:/?c=subject");
    }
    function delete()
    {
        $id = $_GET["id"];
        $subjectRepository = new SubjectRepository();
        $update = $subjectRepository->delete($id);
        session_start();
        if($update)
        {
            $_SESSION["success"]="Đã delete thành công";
        }else{
            $_SESSION["error"]="Đã delete thất bại" . $subjectRepository->$error ;
        }
        header("location:/?c=subject");
    }

}
?>