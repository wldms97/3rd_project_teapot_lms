<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/green/3rd/admin/inc/db.php";

$clidx = $_POST['clidx'];
$uid = $_SESSION['UID'];
$date = date('Y-m-d H:i:s');

if($uid){
  $que = "INSERT INTO lms_cart (cart_clsnum, cart_uid, regdate) 
  VALUES ('$clidx', '$uid', '$date')";
  $res = $mysqli -> query($que) or die('query error'.$mysqli->error);

  if ($res){
    $resp = array("result" => "success");
  }else{
    $resp = array("result" => "fail");
  }
}else{
  $resp = array("result" => "alert");
}

echo json_encode($resp);
?>