<?php
// Set delay 1 second. 
sleep(1);

// Create connection connect to mysql database
$con = mysqli_connect("localhost","root","","checommerce");
$con->set_charset("utf8");
// Next dropdown list.
$nextList = isset($_GET['nextList']) ? $_GET['nextList'] : '';

switch($nextList) {

  case 'groups_id':
  $categoriesId = isset($_GET['categoriesId']) ? $_GET['categoriesId'] : '';

  $result = $con->query("select * from groups where categories_id = '{$_GET["categoriesId"]}'");

  $array = array();
  while($row = $result->fetch_object()){

    array_push($array, $row);
  }
  echo json_encode($array);

  break;


}

?>