<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/green/3rd/user/inc/db.php";

$userid = $_POST["userid"];
$userpw = $_POST["userpw"];
$userpw = hash('sha512',$userpw);

$sql = "UPDATE lms_user set userpw='$userpw' where userid = '$userid'";
$result = $mysqli->query($sql) or die("query error => ".$mysqli->error);

if($result){
  echo "<script>
  alert('비밀번호가 변경되었습니다.');
  location.href='/green/3rd/login.php';
</script>";
}

?>