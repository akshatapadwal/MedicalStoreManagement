<?php
    session_start();
    pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");
    if(isset($_SESSION['sid']))    
        $res=pg_query("select * from product order by pid");
    else
        header('Location:login.html');
    if(isset($_GET['pid']))
    {
        $p=$_GET['pid'];
        $res10=pg_fetch_array(pg_query("select * from product where pid='$p'"));
    }
?>
<html>
    <head>
        <title>View Product
        </title>
    </head>
    <link href="home1.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
        }

        th,td{
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even){
            background-color: #4CAF50;
            color: orange;
        }
    </style>
    
    <body>
        <div class="policebox">
            <form action="viewbill.php" method="post">
            <label>ID</label>
            <input type="text" name="pid" value="<?php if(isset($_GET['pid'])) echo $res10['pid']; ?>">    
            <label>Name</label>
            <input type="text" name="pname" value="<?php if(isset($_GET['pid'])) echo $res10['pname']; ?>">
            <label>Quantity</label>
            <input type="text" name="pq" placeholder="Enter Product's Quantity">
            <input type="submit" value="Add to list">  
            </form>
            <table>
                
                <tr>
                    <th>SR.NO.</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>MANUFACTURER</th>
                    <th>DATE OF PACKAGING</th>
                    <th>DATE OF EXPIRY</th>
                    <th>ACTION</th>
                    
                </tr>
                <?php
                    $n=1;
                    while($r=pg_fetch_array($res))
                        {
                        $p=$r['pid'];
                        echo "<tr>";
                       
                        echo "<td>".$n++."</td>";
                        echo "<td>".$r['pname']."</td>";
                        echo "<td>".$r['pprice']."</td>";
                        echo "<td>".$r['pmanufacturer']."</td>";
                        echo "<td>".$r['pdop']."</td>";
                        echo "<td>".$r['pdoe']."</td>";
                        echo "<td><a href=getproduct.php?pid=$p>Add</a>";
                        echo "</tr>";
                        }
                ?>
                
            </table>
        </div>
    </body>
</html>