<?php
class StudentRepository
{
    public $error;  
    function getBysearch($search)
    {
        $cond = "name LIKE '%$search%'";
        $student = $this -> fetch($cond);
        return $student ;

    }
    function getALL()
    {
         return $this ->fetch();

    }
    function fetch($cond = null)
    {
        global $conn; // do cái biến này nằm ở file connect.php, theo quy tắt bên trong không thể nhìn thấy bên ngoải nên ta phải dùng global để làm việc này
        $sql = "SELECT * FROM student";
        if($cond)
        {
            $sql .=" WHERE $cond";
        }
        $result = $conn->query($sql);
        $students=[];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc())
            {
                $student = new Student($row["id"],$row["name"],$row["birthday"],$row["gender"]);
                $students[] = $student; // lưu ý muốn add phần tử vào mảng phải ghi có dấu []
            }
        }
        return $students;
    }
    function save($data)
    {
        global $conn;
        $name = $data["name"];
        $birthday = $data["birthday"];
        $gender = $data["gender"];
        $sql = "INSERT INTO student(name,birthday,gender) VALUES('$name','$birthday', $gender)";
        if($conn->query($sql)===TRUE)
        {
            return true;
        }
        else 
        {
            $this->error = "ERROR". $sql . "<br>" .$conn->error;
            return false;
        }

    }
    function edit($id)
    {
        $cond ="id=$id";
        $students = $this->fetch($cond);
        $student = current($students); // con trỏ này sẽ lấy thằng đầu tiên vì nó nằm tại con trỏ
        return $student;
    }
    function update($data)
    {
        global $conn;
        $id=$data["id"];
        $name=$data["name"];
        $birthday=$data["birthday"];
        $gender=$data["gender"];
        $sql = "UPDATE student SET name = '$name',birthday='$birthday',gender=$gender WHERE id=$id";
        if($conn->query($sql)===TRUE)
        {
            return true;
        } else{
            return true;
            $this->error = "ERROR". $sql . "<br>" .$conn->error;
        }
    }
    function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM student WHERE id=$id";
        if($conn->query($sql)===TRUE)
        {
            return true;
        } else{
            return true;
            $this->error = "ERROR". $sql . "<br>" .$conn->error;
        }
    }
}
?>