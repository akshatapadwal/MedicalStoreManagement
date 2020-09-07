<?php
    session_start();
    pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");
    if(isset($_SESSION['sid']))    
        $res=pg_query("select * from customer order by cid");
    else
        header('Location:login.html');
    if(isset($_GET['cid']))
    {
        $cid=$_GET['cid'];
        pg_query("delete from customer where cid='$cid'") or die("Connection Failed");
    }
?>
<html>
    <head>
        <title>View Customer
        </title>
    </head>
    <link href="viewcustomer.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    
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
                    <th>SR.NO.</th>
                    <th>NAME</th>
                    <th>AGE</th>
                    <th>GENDER</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>USERNAME</th>
                    <th>UPDATE</th>
                    <th>DELETE</th>
                </tr>
                <?php
                    $n=1;
                    while($r=pg_fetch_array($res))
                        {
                        echo "<tr>";
                        echo "<td>".$n++."</td>";
                        echo "<td>".$r['cname']."</td>";
                        echo "<td>".$r['cage']."</td>";
                        echo "<td>".$r['cgender']."</td>";
                        echo "<td>".$r['cphone']."</td>";
                        echo "<td>".$r['caddress']."</td>";
                        echo "<td>".$r['cusername']."</td>";
                        $temp=$r['cid'];
                        echo "<td><a href=changecustomer.php?cid=".$temp.">Update</a>";
                        echo "<td><a href=viewcustomer.php?cid=".$temp.">Delete</a>";
                        echo "</tr>";
                        }
                ?>
            </table>
        </div>
    </body>
</html>