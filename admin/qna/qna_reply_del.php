<?php 
    include $_SERVER['DOCUMENT_ROOT']."/green/3rd/admin/inc/db.php";

    $qidx = $_GET['qidx'];
    // $sql = "DELETE FROM lms_qna where qidx='{$qidx}'"; //질문 자체를 삭제해버리는 구문
    $sql = "UPDATE lms_qna SET qna_reply = '', reply_st=0 where qidx=".$qidx;
    $result = $mysqli->query($sql) or die("query error => ".$mysqli->error);
    if($result){
        echo "<script>
        alert('삭제 성공');
        location.replace('qna_list.php');
        </script>";
    }else{
        echo "<script>
            alert('삭제 실패');
            location.replace('qna_read.php');
        </script>";
    }
?>