<?php
    session_start();
    
    if(!isset($_SESSION['sid']))
        header('Location:login.html');
    $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");

?>
<html>  
    <head>
        <title>Add Product
        </title>
    </head>
    <link href="addcustomer.css?v=<?php echo time();?>" rel="stylesheet" type="text/css">
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
            <form action="insertproduct.php" method="post">
                <div class="leftsignbox">
                    <label>Username</label>
                    <input type="text" name="vusername" placeholder="Enter Vendor's Username"><br><br>
                    <label>Name</label>
                    <input type="text" name="pname" placeholder="Enter Product's Name"><br><br>
                    <label>Price(in rs.)</label>
                    <input type="text" name="pprice" placeholder="Enter Product's Price"><br><br>
                    <label>Manufacturer</label>
                    <input type="text" name="pmanufacturer" placeholder="Enter Manufacturer"><br><br>
                </div>
                 <div class="leftsignbox1">
               
                    <label>Date of Packaging</label>
                    <input type="date" name="pdop"><br><br>
                    <label>Date of Expiry</label>
                    <input type="date" name="pdoe"><br><br>
                    <input type="submit" value="Add Product">  
                </div>
            </form>
    </body>
</html>