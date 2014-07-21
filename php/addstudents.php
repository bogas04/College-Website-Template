<?php  include 'student.class';
  error_reporting(0);
  $reName = "/[a-zA-Z ']/";  $reRoll = '/[0-9]*\/MP\/[0-9]*/';  $reEmail = '/[\S]*@[\S]*\.[\S]*/';  
  $name = $_POST['name'];
  $roll = $_POST['roll'];
  $email = $_POST['email'];
  if(!isset($_FILES['image']['name'])) {
     echo "<h1>Error</h1>"."Please upload a file.";
     die();
  }
  if(isset($name,$roll,$email)) {    if(!preg_match($reName,$name)) {      echo "<h1>Error</h1>"."Invalid name.";      die();    }    if(!preg_match($reRoll,$roll)) {      echo "<h1>Error</h1>"."Invalid roll number. Eg : 123/MP/12";      die();    }    if(!preg_match($reEmail,$email)) {      echo "<h1>Error</h1>"."Invalid email.";      die();    }
    $image = uploadImage($name,$roll);
    if(($dbObject = file_get_contents('student.db')) === false)
      $dbObject = array();
    else 
      $dbObject = unserialize($dbObject);
    $student = new Person($name,$roll,$image,$email);
    $a = strtoupper($name);
    if($dbObject[$a[0]][$roll]) {
      echo "<h1>Error</h1>"."This roll number already exists!";
      die();
    }
    $dbObject[$a[0]][$roll] = $student;
    fwrite(fopen('student.db',"w"),serialize($dbObject));
    header("Location:../students.php?s=1");
  } else {
    echo "<h1>Error</h1>"." Fill all details!";
  }
  
  function uploadImage($n,$r) {
    $allowedExts = array("gif", "jpeg", "jpg", "png", "bmp");
    $temp = explode(".", $_FILES["image"]["name"]);
    $extension = strtolower(end($temp));
    $r = str_replace("/","-",$r);
    if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES['image']["type"] == "image/jpeg") || ($_FILES['image']["type"] == "image/jpg") || ($_FILES['image']["type"] == "image/pjpeg") || ($_FILES['image']["type"] == "image/x-png") || ($_FILES['image']["type"] == "image/png") || ($_FILES['image']["type"] == "image/bmp")) && ($_FILES['image']["size"] < 1048576) && in_array($extension, $allowedExts)) {
      if ($_FILES["image"]["error"] > 0) {
        echo "<h1>Error</h1>".$_FILES['image']["error"];
        die();
      } else {
        move_uploaded_file($_FILES["image"]["tmp_name"],"../img/people/students/" . strtolower($n.$r.'.'.$extension));
        return "img/people/students/" . strtolower($n.$r.'.'.$extension);
      }
    } else {  
      echo "<h1>Error</h1>"."Invalid File <br> Error : ".$_FILES["image"]["type"].'<br> File Size : '.$_FILES['image']["size"];
      die();
    }
  }?>