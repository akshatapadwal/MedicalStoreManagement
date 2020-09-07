<?php
    session_start();
    
    if(!isset($_SESSION['sid']))
        header('Location:login.html');
    $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");

?>
<html>  
    <head>
        <title>Add Bill
        </title>
    </head>
    <link href="addbill.css?V=<?php time();?>" rel="stylesheet" type="text/css">
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
            <form action="insertbill.php" method="post">
                <div class="leftsignbox">
                    <label>Generate Bill for </label>
                    <input type="text" name="cusername" placeholder="Enter Customer's Username">
                    <input type="submit" value="Add Product">  
                </div>
            </form>
    </body>
</html>