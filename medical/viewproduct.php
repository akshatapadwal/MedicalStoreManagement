<?php
    session_start();
    pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");
    if(isset($_SESSION['sid']))    
        $res=pg_query("select * from product order by pid");
    else
        header('Location:login.html');
  if(isset($_GET['pid']))
    {
        $pid=$_GET['pid'];
        pg_query("delete from product where pid='$pid'") or die("Connection Failed");
    }
?>
<html>
    <head>
        <title>View Vendor
        </title>
    </head>
    <link href="home1.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <style>
        body{
            background-color: lightskyblue;
        }

         .logo img
        {
    width: 150px;
    height: auto;
    float: left;
        }
        .main-nav
        {
    color: black;
    text-decoration: none;
    padding: 5px 20px;
    font-family: "Roboto",sans-serif;
    font-size: 18px;
         float: left;
    list-style: none;
    margin-top: 40px;
   }

        table{
            border-collapse: collapse;
            width: 100%;
        }

        th,td{
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even){
            background-color: #f2f2f2;
            color: black;
        }
    </style>
    
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
                    <th>PRICE</th>
                    <th>MANUFACTURER</th>
                    <th>DATE OF PACKAGING</th>
                    <th>DATE OF EXPIRY</th>
                    <th>VENDOR'S NAME</th>
                    <th>DELETE</th>
                    
                </tr>
                <?php
                    $n=1;
                    while($r=pg_fetch_array($res))
                        {
                        $unm=$r['vid'];
                        $res1=pg_fetch_array(pg_query("select * from vendor where vid='$unm'"));
                        echo "<tr>";
                        echo "<td>".$n++."</td>";
                        echo "<td>".$r['pname']."</td>";
                        echo "<td>".$r['pprice']."</td>";
                        echo "<td>".$r['pmanufacturer']."</td>";
                        echo "<td>".$r['pdop']."</td>";
                        echo "<td>".$r['pdoe']."</td>";
                        echo "<td>".$res1['vname']."</td>";
                        $temp=$r['pid'];
                        echo "<td><a href=viewproduct.php?pid=".$temp.">Delete</a>";
                        echo "</tr>";
                        
                        }
                ?>
            </table>
        </div>
    </body>
</html>