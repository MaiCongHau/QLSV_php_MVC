<?php
class RegisterRepository
{
    public $error;  
    function getBysearch($search)
    {
        $cond = "student.name LIKE '%$search%' OR subject.name LIKE '%$search%'";
        $register = $this -> fetch($cond);
        return $register ;

    }
    function getALL()
    {
         return $this ->fetch();

    }
    function fetch($cond = null)
    {
        global $conn; // do cái biến này nằm ở file connect.php, theo quy tắt bên trong không thể nhìn thấy bên ngoải nên ta phải dùng global để làm việc này
        $sql = "SELECT register.*, student.name AS student_name, subject.name AS subject_name FROM register
        JOIN student ON register.student_id = student.id
        JOIN subject ON register.subject_id = subject.id";
        if($cond)
        {
            $sql .=" WHERE $cond";
        }
        $result = $conn->query($sql);
        $registers=[];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc())
            {
                $register = new Register($row["id"],$row["student_id"],$row["subject_id"],$row["score"],$row["student_name"],$row["subject_name"]);
                $registers[] = $register; // lưu ý muốn add phần tử vào mảng phải ghi có dấu
            }
        }
        
        return  $registers;
    }
    function save($data)
    {
        global $conn;
        $student_id = $data["student_id"];
        $subject_id = $data["subject_id"];
        $sql = "INSERT INTO register(student_id,subject_id) VALUES($student_id,$subject_id)";
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
        $cond ="register.id=$id";
        $registers = $this->fetch($cond);
        $register = current($registers); // con trỏ này sẽ lấy thằng đầu tiên vì nó nằm tại con trỏ
        return $register;
    }
    function update($data)
    {
        global $conn;
        $id=$data["id"];
        $score=$data["score"];
        $sql = "UPDATE register SET score=$score WHERE register.id=$id ";
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
        $sql = "DELETE FROM register WHERE register.id=$id";
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