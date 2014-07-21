<?php
  include 'student.class';
  error_reporting(0);

  $name = $_GET['name'];
  $roll = $_GET['roll'];
  if(isset($name)) {
    $dbObject = ($dbObject = file_get_contents('student.db')) === false?array():unserialize($dbObject);
    $a = strtoupper($name);
    $count = 0;
    $result = array('count'=>$count,'error'=>'none');
    if(!$dbObject[$a[0]]) {
      echo json_encode(array('error'=>'empty'));
      die();
    }
    foreach($dbObject[$a[0]] as $person) {
      if(stripos($person->getName(),$name) !== false) {
        $result['records'][] = $person;
        $count++;
      }
    }
    $result['count'] = $count;
    echo json_encode($result);
  } else if(isset($roll)) {
    $dbObject = ($dbObject = file_get_contents('student.db')) === false?array():unserialize($dbObject);
    $count = 0;
    $result = array('count'=>$count,'error'=>'none');
    foreach($dbObject as $alphabet) {
        if($person = $alphabet[$roll]) {
          $result['records'][] = $person;
          $count++;
        }
    }
    $result['count'] = $count;
    echo json_encode($result);
  } else {
    echo json_encode(array("error"=>"incomplete"));
  }
?>