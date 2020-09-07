<?php
    session_start();
    
    if(!isset($_SESSION['sid']))
        header('Location:login.html');
    $db=pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");

?>
<html>  
    <head>
        <title>Add Customer
        </title>
    </head>
    <link href="addcustomer.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" >
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
            <form action="insertcustomer.php" method="post">
                <div class="leftsignbox">
                    <label>Name</label>
                    <input type="text" name="cname" placeholder="Enter Customer's Name"><br><br>
                    <label>Age</label>
                    <input type="text" name="cage" placeholder="Enter Customer's Age"><br><br>
                    <label>Gender</label>
                    <br><br>
                    <label class="gender">Male</label>
                    <input type="radio" name="cgender" value="Male"><br><br>
                    <label class="gender">Female</label>
                    <input type="radio" name="cgender" value="Female"><br><br>
                
                    <label class="gender">Other</label>
                    <input type="radio" name="cgender" value="Other"><br><br>

</div>                  
                  <div class="leftsignbox1">
              
                <label>Phone</label>
                    <input type="text" name="cphone" placeholder="Enter Customer's Phone Number"><br><br>
                    <label>Address</label>
                    <input type="text" name="caddress" placeholder="Enter Customer's Address"><br><br>
                    <label>Username</label>
                    <input type="text" name="cusername" placeholder="Enter New Username"> <br><br>    
                    <input type="submit" value="Add Customer">  
                </div>
            </form>
    </body>
</html>