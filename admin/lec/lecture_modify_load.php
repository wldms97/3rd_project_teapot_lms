<?php
include $_SERVER['DOCUMENT_ROOT']."/green/3rd/admin/inc/db.php";
// error_reporting( E_ALL );
// ini_set( "display_errors", 1 );

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$lidx = $request->lidx;

$que= "SELECT * FROM lms_lec WHERE lidx='$lidx'";
$raw = $mysqli ->query($que) or die("query_error".$mysqli->error);
$row = $raw -> fetch_object();

$que1 = "SELECT * FROM lms_timestamp WHERE ts_lecnum = '$lidx' ORDER BY tsidx ASC";
$raw1 = $mysqli -> query($que1) or die("query_error".$mysqli->error);
$row1 = array();
while($raw1_obj = $raw1->fetch_object()){
  $row1[] = $raw1_obj;
};

if($row){
  if($row1){
    $row->row1 = $row1;
    $data = $row;
    }else{     
      $data = $row;
    }
  }else{
    $data = array(
      'result' => 'error',
      'massage' => '실패',
    );
  }
echo json_encode($data);
?>