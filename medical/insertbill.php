<?php
    session_start();
    
    if(!isset($_SESSION['sid']))
        header('Location:login.html');
    $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");

    $sid=$_SESSION['sid'];

    $cusername=$_POST['cusername'];
    $res=pg_fetch_array(pg_query("select * from customer where cusername='$cusername'"));

    if(!$cusername==$res['cusername'])
        header('Location:home.html');
    else
    {
    $cid=$res['cid'];
    $bamt=0;
    pg_query("insert into bill(cid,sid,bamt) values('$cid','$sid','$bamt')") or die(pg_last_error());
    }
    
    header("Location:viewbill.php");
?>