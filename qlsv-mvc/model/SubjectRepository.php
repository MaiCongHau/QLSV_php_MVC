<?php 
    class SubjectRepository{
        public $error;
        
        function fetch($cond = null)
        {
            global $conn;
            $subjects=[];
            $sql = "SELECT * FROM subject";
            if($cond)
            {
             $sql .= " WHERE $cond";
            }
            $result=$conn->query($sql);
            if($result->num_rows > 0)
            {   
                while($row = $result->fetch_assoc())
                {
                    $subject = new Subject($row["id"],$row["name"],$row["number_of_credit"]);
                    $subjects[] = $subject;
                }
            }
            return $subjects;
        }
        function getALL()
        {
           return $this->fetch();
        }

        function save($data)
        {
            global $conn;
            $name = $data["name"];
            $number_of_credit=$data["number_of_credit"];
            $sql = "INSERT INTO subject (name,number_of_credit) VALUES ('$name',$number_of_credit)";
            if($conn->query($sql)===TRUE)
            {
                return true;
            }
            else{
                $this->error = "ERROR". $sql . "<br>" .$conn->error;
                return false;
            }
        }
        function update($data)
        {
            global $conn;
            $id = $data["id"];
            $name = $data["name"];
            $number_of_credit = $data["number_of_credit"];
            $sql = "UPDATE subject SET name ='$name',number_of_credit= $number_of_credit WHERE id =$id ";
            if($conn->query($sql)===TRUE)
            {
                return true; 
            }else{
                $this->error = "ERROR". $sql . "<br>" .$conn->error;
                return false;
            }
        }
        function delete($id)
        {
            global $conn;
            $sql = "DELETE FROM subject WHERE id=$id";
            if($conn->query($sql)===TRUE)
            {
                return true; 
            }else{
                $this->error = "ERROR". $sql . "<br>" .$conn->error;
                return false;
            }
        }
        function getbySearch($search)
        {
            $conn = "name LIKE '%$search%'";
            return $this->fetch($conn);
        }
    }
?>