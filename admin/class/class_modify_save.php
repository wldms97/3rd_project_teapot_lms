<?php
    session_start();
    ini_set('display_errors',1);
    include $_SERVER['DOCUMENT_ROOT']."/green/3rd/admin/inc/db.php";

    if(!$_SESSION['AUID']){
        echo "<script>
            alert('권한이 없습니다');
            history.back();
        </script>";
        exit;       
    };

    $pid = $_REQUEST['pid'];
    $ismain=$_REQUEST["ismain"];
    $isnew=$_REQUEST["isnew"];
    $isbest=$_REQUEST["isbest"];
    $isrecom=$_REQUEST["isrecom"];
    $stat=$_REQUEST["stat"];
    // print_r($pid);
    // echo '<br>';
    // print_r($ismain);
    // echo '<br>';
    // print_r($isnew);
    // echo '<br>';
    // print_r($isbest);
    // echo '<br>';
    // print_r($isrecom);
    // echo '<br>';
    // print_r($stat);

    foreach($pid as $p){
        $ismain[$p] =  $ismain[$p] ?? 0; 
        $isnew[$p]=$isnew[$p]??0;
        $isbest[$p]=$isbest[$p]??0;
        $isrecom[$p]=$isrecom[$p]??0;

        $query = "UPDATE products set ismain=".$ismain[$p].", isnew=".$isnew[$p].", isbest=".$isbest[$p].", isrecom=".$isrecom[$p].", status=".$stat[$p]." where pid=".$p;
        $rs = $mysqli -> query($query) or die($mysqli -> error);
    }


    if($rs){
        echo "<script>alert('수정했습니다.');history.back();</script>";
        exit;   
    
    }else{
        echo "<script>alert('수정하지 못했습니다. 관리자에게 문의해주십시오.');history.back();</script>";
        exit;
    }
    

?>