<?php
    session_start();
    pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");
    if(isset($_SESSION['sid']))    
        $res=pg_query("select * from bill order by bid");
    else
        header('Location:login.html');
?>
<html>
    <head>
        <title>View Vendor
        </title>
    </head>
    <link href="viewbilllist.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    
    <body>
             <header>
            <div class="row">
                <div class="logo">
                <img src="logo.jpg">

                </div>
                <div class="main-nav">
                    <a class="active" href="home.php">Home</a>
                    <a href="addvendor.php">Add Vendor</a>
                	<a href="viewvendor.php">View Vendor</a>
                 	<a href="addcustomer.php">Add Customer</a>
                 	<a href="viewcustomer.php">View Customer</a>
                 	<a href="addproduct.php">Add Product</a>
                    <a href="viewproduct.php">View Product</a>
                    <a href="addbill.php">Add Bill</a>
                    <a href="viewbilllist.php">View Bill</a>
                    <a class="button" href="logout.php">Log Out</a>
                </div>
            </div>
        </header>
        <div class="policebox">
            <table>
                <tr>
                    <th>ID</th>
                    <th>DATE & TIME</th>
                    <th>CUSTOMER NAME</th>
                    <th>GENEARTED BY</th>
                    <th>TOTAL AMOUNT</th>
                    <th>ACTION</th>
                </tr>
                <?php
                    while($r=pg_fetch_array($res))
                        {
                        $cid=$r['cid'];
                        $res1=pg_fetch_array(pg_query("select * from customer where cid='$cid'"));
                        $sid=$r['sid'];
                        $res2=pg_fetch_array(pg_query("select * from staff where sid='$sid'"));
                        $b=$r['bid'];
                        $_SESSION['bid']=$b;
                        echo "<tr>";
                        echo "<td>".$r['bid']."</td>";
                        echo "<td>".$r['bts']."</td>";
                        echo "<td>".$res1['cname']."</td>";
                        echo "<td>".$res2['sname']."</td>";
                        echo "<td>".$r['bamt']."</td>";
                        $temp=$r['bid'];
                        echo "<td><a href=viewbilldetails.php?bid=".$temp.">View Bill</a>";
                        echo "</tr>";
                        }
                ?>
            </table>
        </div>
    </body>
</html>