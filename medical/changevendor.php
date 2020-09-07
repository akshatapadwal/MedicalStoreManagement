<?php
    session_start();
$vid=$_GET['vid'];
$_SESSION['vid']=$vid;
 if(!isset($_SESSION['sid']))    
      header('Location:login.html');

   $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");
        $res=pg_fetch_array(pg_query("select * from vendor where vid='$vid'"));
    $gen=$res['vgender'];
?>
       
<html>
    <head>
        <title>View Vendor
        </title>
    </head>
        <link href="updatevendor.css?v=<?php echo time();?>" rel="stylesheet" type="text/css">
  
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
        
          <form action="updatevendor.php" method="post">
                <div class="leftsignbox">
                    <label>Name</label>
                    <input type="text" name="vname" value="<?php echo $res['vname']; ?> "><br><br>
                    <label>Age</label>
                    <input type="text" name="vage"  value="<?php echo $res['vage']; ?> "><br><br>
                    <label>Gender</label><br><br>
                    <label class="gender">Male</label>
                    <input type="radio" name="vgender" value="Male" <?php if($gen=='Male') echo "checked"; ?> ><br><br>
                    <label class="gender">Female</label>
                    <input type="radio" name="vgender" value="Female"<?php if($gen=='Female') echo "checked"; ?> ><br><br>
                    <label class="gender">Other</label>
                    <input type="radio" name="vgender" value="Other"<?php if($gen=='Other') echo "checked"; ?> ><br><br>
              </div>
                 <div class="leftsignbox1">

              
                    <label>Phone</label>
                    <input type="text" name="vphone" value="<?php echo $res['vphone']; ?>"><br><br>
                    <label>Address</label>
                    <input type="text" name="vaddress" value="<?php echo $res['vaddress']; ?>"><br><br>
                    <label>Username</label>
                    <input type="text" name="vusername" value="<?php echo $res['vusername']; ?>"> <br><br>     
                    <input type="submit" value="Update">  
        </div>
        </form>
    </body>
</html>