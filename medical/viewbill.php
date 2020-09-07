<?php
    session_start();
    pg_connect("host=localhost port=5432 dbname=mms user=postgres password=1234") or die("Connection Failed");
    if(isset($_SESSION['sid']))    
        $res=pg_query("select * from bill where bid=(select max(bid) from bill)");
    else
        header('Location:login.html');
    if(isset($_POST['pid']))
    {
        $bd=$_SESSION['bid'];
        $p=$_POST['pid'];
        $pq=$_POST['pq'];
        pg_query("insert into bp(bid,pid,quantity) values('$bd','$p','$pq')");
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
            background-image: url("h6.jpg");
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
        tr:nth-child(odd){
            background-color: #A9A9A9;
            color: black;
        }
    </style>
    
    <body>
        <div class="policebox">
            
                <table>
                    <tr>
                        <th>SR.NO.</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>TOTAL</th>
                    </tr>
                    <?php
                        $res20=pg_fetch_array(pg_query("select * from bill where bid=(select max(bid) from bill)"));
                        $b=$res20['bid'];
                        $n=1;
                        $totalamt=0;
                        $total=0;
                        $res=pg_query("select * from bp where bid='$b'");
                        while($r=pg_fetch_array($res))
                            {
                            $pid=$r['pid'];
                            $res1=pg_fetch_array(pg_query("select * from product where pid='$pid'"));
                    
                            echo "<tr>";
                            echo "<td>".$n++."</td>";
                            echo "<td>".$res1['pname']."</td>";
                            echo "<td>".$res1['pprice']."</td>";
                            echo "<td>".$r['quantity']."</td>";
                            $total=($res1['pprice']*$r['quantity']);
                            $totalamt+=$total;
                            echo "<td>".$total."</td>";
                            echo "</tr>";
                            }
                        pg_query("update bill set bamt=bamt+'$total' where bid='$b'");
                    ?>
                </table>
                
            <input class="addbutton" type="button" value="Add Product" onclick="location.href='getproduct.php';">
          
 
        </div>
                
                <div class="policebox">
            <table>
                <tr>
                    <th>ID</th>
                    <th>DATE</th>
                    <th>CUSTOMER NAME</th>
                    <th>GENEARTED BY</th>
                    <th>TOTAL AMOUNT</th>
                </tr>
                <?php
                 $res=pg_query("select * from bill where bid=(select max(bid) from bill)");
                    while($r=pg_fetch_array($res))
                        {
                        
                        $cid=$r['cid'];
                        $res1=pg_fetch_array(pg_query("select * from customer where cid='$cid'"));
                        $sid=$r['sid'];
                        $res2=pg_fetch_array(pg_query("select * from staff where sid='$sid'"));
                        
                        $_SESSION['bid']=$b;
                        echo "<tr>";
                        echo "<td>".$r['bid']."</td>";
                        echo "<td>".$r['bts']."</td>";
                        echo "<td>".$res1['cname']."</td>";
                        echo "<td>".$res2['sname']."</td>";
                        echo "<td>".$r['bamt']."</td>";
                        echo "</tr>";
                        }
                ?>
            </table>
                      <input class="addbutton" type="button" value="View Bill" onclick="location.href='viewbilllist.php';">
                
        </div>
            
    </body>
</html>