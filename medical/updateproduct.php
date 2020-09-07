<?php
    session_start();
     $pid=$_SESSION['pid'];
  
    if(!isset($_SESSION['sid']))
        header('Location:login.html');
    $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");

    $vusername=$_POST['vusername'];
    $res=pg_fetch_array(pg_query("select * from vendor where vusername='$vusername'"));

    if(!$vusername==$res['vusername'])
        header('Location:home.html');
    else
    {
    $vid=$res['vid'];

    $pname=$_POST['pname'];
    $pprice=$_POST['pprice'];
    $pmanufacturer=$_POST['pmanufacturer'];
    $pdop=$_POST['pdop'];
    $pdoe=$_POST['pdoe'];

    pg_query("update product set ='$pname',pprice='$pprice',pmanufacturer='$pmanufacturer',pdoe='$pdop' where pid='$pid'") or die(pg_last_error());
    }
    
    header("Location:viewproduct.php");
?>