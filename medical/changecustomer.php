<?php
    session_start();
    $cid=$_GET['cid'];
  $_SESSION['cid']=$cid;
    if(!isset($_SESSION['sid']))    
        header('Location:login.html');
    $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");
   $res=pg_fetch_array(pg_query("select * from customer where cid='$cid'"));
$gen=$res['cgender'];
?>
<html>  
    <head>
        <title>Add Customer
        </title>
    </head>
    <link href="updatecustomer.css?v=<?php echo time();?>" rel="stylesheet" type="text/css">
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
            <form action="updatecustomer.php" method="post">
                <div class="leftsignbox">
                    <label>Name</label>
                    <input type="text" name="cname" value="<?php echo $res['cname']; ?> "><br><br>
                    <label>Age</label>
                    <input type="text" name="cage" value="<?php echo $res['cage']; ?>"><br><br>
                    <label>Gender</label>
                    <br>
                    <label class="gender">Male</label>
                    <input type="radio" name="cgender" value="Male"  <?php if($gen=='Male') echo "checked"; ?> >
                    <br><br>
                     <label class="gender">Female</label>
                    <input type="radio" name="cgender" value="Female"  <?php if($gen=='Female') echo "checked"; ?>>
                    <br><br>
                    <label class="gender">Other</label>
                    <input type="radio" name="cgender" value="other"  <?php if($gen=='Other') echo "checked"; ?>>
                    <br><br>
                </div>
                 <div class="leftsignbox1">
               
                    <label>Phone</label>
                    <input type="text" name="cphone" value="<?php echo $res['cphone']; ?>"><br><br>
                    <label>Address</label>
                    <input type="text" name="caddress" value="<?php echo $res['caddress']; ?>"><br><br>
                    <label>Username</label>
                    <input type="text" name="cusername" value="<?php echo $res['cusername']; ?>"> <br><br>    
                    <input type="submit" value="Update">  
                </div>
            </form>
    </body>
</html>