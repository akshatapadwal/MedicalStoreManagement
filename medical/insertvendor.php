<?php
    session_start();
    
    if(!isset($_SESSION['sid']))
        header('Location:login.html');
    $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");

    $vname=$_POST['vname'];
    $vage=$_POST['vage'];
    $vgender=$_POST['vgender'];
    $vphone=$_POST['vphone'];
    $vaddress=$_POST['vaddress'];
    $vusername=$_POST['vusername'];

    $sid=$_SESSION['sid'];

    pg_query("insert into vendor(vname,vage,vgender,vphone,vaddress,vusername,sid) values('$vname','$vage','$vgender','$vphone','$vaddress','$vusername','$sid')") or die(pg_last_error());

    header("Location:viewvendor.php");
?>