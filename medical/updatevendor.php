<?php
    session_start();
     $vid=$_SESSION['vid'];
  
    if(!isset($_SESSION['sid']))
        header('Location:login.html');
    $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");

    $vname=$_POST['vname'];
    $vage=$_POST['vage'];
    $vgender=$_POST['vgender'];
    $vphone=$_POST['vphone'];
    $vaddress=$_POST['vaddress'];
    $vusername=$_POST['vusername'];

   

    pg_query("update vendor set vname='$vname',vage='$vage',vgender='$vgender',vphone='$vphone',vaddress='$vaddress',vusername='$vusername' where vid='$vid'") or die(pg_last_error());

    header("Location:viewvendor.php");
?>