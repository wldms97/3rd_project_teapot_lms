<?php
    $hostname = 'localhost';
    $dbuserid = 'wldms97';
    $dbpasswd = 'tpqmsxls13!';
    $dbname = 'wldms97';

    $mysqli = new mysqli($hostname,$dbuserid, $dbpasswd,$dbname);
    if($mysqli -> connect_errno){
        die('Connect Error:'.$mysqli->connect_error);
    } 
?>