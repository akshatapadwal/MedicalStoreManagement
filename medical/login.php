<?php
    session_start();
    
    $uname=$_POST['uname'];
    $password=$_POST['password'];
    
    $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");

    $res=pg_fetch_array(pg_query("select * from staff where susername='$uname' and spassword='$password'"));

    if($uname==$res['susername'] && $password==$res['spassword'])
    {
        $_SESSION['sid']=$res['sid'];
        header('Location:home.php');
    }
    else
        header('Location:login.html');            
    ?>