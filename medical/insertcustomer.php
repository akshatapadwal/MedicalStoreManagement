<?php
    session_start();
    
    if(!isset($_SESSION['sid']))
        header('Location:login.html');
    $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");

    $cname=$_POST['cname'];
    $cage=$_POST['cage'];
    $cgender=$_POST['cgender'];
    $cphone=$_POST['cphone'];
    $caddress=$_POST['caddress'];
    $cusername=$_POST['cusername'];

    pg_query("insert into customer(cname,cage,cgender,cphone,caddress,cusername) values('$cname','$cage','$cgender','$cphone','$caddress','$cusername')") or die(pg_last_error());

    header("Location:viewcustomer.php");
?>