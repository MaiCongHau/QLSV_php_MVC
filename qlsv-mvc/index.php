<?php  
// load model
require "config.php";
require "connect.php";
require "model/Student.php";
require "model/Subject.php";  
require "model/Register.php";  
require "model/SubjectRepository.php";
require "model/StudentRepository.php";
require "model/RegisterRepository.php";
require "functions.php";
//Router
$c =$_GET["c"]?? "student"; // ban đầu zô thì kiếm thằng para là $_GET["c"], nếu có thì nó lấy thằng $_GET["c"] gán cho $c, nếu không thì nó lấy thằng "student"
$a = $_GET["a"]?? "list";// ban đầu zô thì kiếm thằng para là $_GET["a"], nếu có thì nó lấy thằng $_GET["a"] gán cho $a, nếu không thì nó lấy thằng "list"
$controllerName = ucfirst($c)."Controller"; // in hoa chữ cái đầu tiên, ta được StudentController
require "controller/".$controllerName. ".php"; // ra cái link
$controller = new $controllerName(); // tạo object: thằng này là StudentController, SubjectController
$controller->$a(); // truy cập tới function $a là list();
?>