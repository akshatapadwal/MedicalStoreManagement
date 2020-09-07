<?php
    session_start();
    pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");
    if(isset($_SESSION['sid']))    
        $res=pg_query("select * from vendor order by vid");
    else
        header('Location:login.html');
  if(isset($_GET['vid']))
    {
        $vid=$_GET['vid'];
        pg_query("delete from vendor where vid='$vid'") or die("Connection Failed");
    }

?>
<html>
    <head>
        <title>View Vendor
        </title>
    </head>
    <link href="login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <style>
        body{
            background-color: lightblue;
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
            padding: 5px;
        }
        tr:nth-child(even){
            background-color: #A9A9A9;
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
                        echo "<td>".$r['vname']."</td>";
                        echo "<td>".$r['vage']."</td>";
                        echo "<td>".$r['vgender']."</td>";
                        echo "<td>".$r['vphone']."</td>";
                        echo "<td>".$r['vaddress']."</td>";
                        echo "<td>".$r['vusername']."</td>";
                        $temp=$r['vid'];
                          echo "<td><a href=changevendor.php?vid=".$temp.">Update</a>";
                        echo "<td><a href=viewvendor.php?vid=".$temp.">Delete</a>";
                      
                        echo "</tr>";
                        }
                ?>
            </table>
        </div>
    </body>
</html>