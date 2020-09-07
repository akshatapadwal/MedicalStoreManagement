<?php
    $sname=$_POST['sname'];
    $susername=$_POST['susername'];
    $spassword=$_POST['spassword'];

    $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");

    pg_query("insert into staff(sname,susername,spassword) values('$sname','$susername','$spassword')") or die(pg_last_error());

    header("Location:login.html");
?>