

<!DOCTYPE html>
<html>
<head>
  <title>Admin View</title>
  <style>
    body{
        background-image: linear-gradient(rgb(255, 152, 8),yellow, rgb(233, 233, 45),rgba(180, 232, 39, 0.868));
            background-repeat : no-repeat;
            background-attachment: fixed;
            font-size:20px;
    }
    table{
        margin-left:auto;
        margin-right:auto;
    }
    h2{
        text-align:center;
    }
    table td{
        border: 1px solid black;
        padding:5px;
        margin:0px;
        background-color: rgb(231, 239, 242);
        
    }
    table th{
        border: 1px solid black;
        padding:5px;
        background-color:rgb(129, 173, 248);
    }
    table{
        border-collapse: collapse;
    }

    </style>
</head>
<body>
  <h2>Admin View</h2>
  <table>
    
      
</table>
    <?php
    
    session_start();
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "login_credentials";
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $query1 = "SELECT * FROM shipment";
    $result1 = mysqli_query($conn, $query1);
    $query2 = "SELECT * FROM shipment2";
    $result2 = mysqli_query($conn, $query2);
    $c1netquan = 0;
    $c1netweight = 0;
    $c1netcount = 0;
    $c2netquan = 0;
    $c2netweight = 0;
    $c2netcount = 0;
    while ($row = mysqli_fetch_assoc($result1)) {
        $c1netquan += $row["quantity"]  ;
        $c1netweight += $row["weight"]  ;
        $c1netcount += $row["count"] ;
    }
    while ($row = mysqli_fetch_assoc($result2)) {
        $c2netquan += $row["quantity"]  ;
        $c2netweight += $row["weight"]  ;
        $c2netcount += $row["count"] ;
    }

    echo "<table>";
    echo "<tr>";
    echo "<th>Item/customer</th>";
      echo "<th>Customer1</th>";
      echo "<th>Customer2</th>";
      echo "<th>Total</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Quantity</td>";
    echo "<td>".$c1netquan."</td>";
    echo "<td> ".$c2netquan."</td>";
    echo "<td> ".$c1netquan + $c2netquan."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Weight</td>";
    echo "<td>".$c1netweight."</td>";
    echo "<td> ".$c2netweight."</td>";
    echo "<td> ".$c1netweight + $c2netweight."</td>";
    echo "</tr>";
    echo "<td>Box count</td>";
    echo "<td>".$c1netcount."</td>";
    echo "<td> ".$c2netcount."</td>";
    echo "<td> ".$c1netcount + $c2netcount."</td>";
    echo "</tr>";
    echo "</table>";
//     echo $c1netquan. ' ' 
//    . $c1netweight .' '
//     .$c1netcount ;
    
//     while ($row = mysqli_fetch_assoc($result1)) {
//     echo $row["quantity"]  ;
//     echo "<br>";
    
//     echo $row["weight"]  ;
//     echo "<br>";
     
//     echo $row["count"] ;
//     echo "<br>";echo "<br>";echo "<br>";
// }
?>
      <!-- <tr>
        <td>Quantity</td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['company']; ?></td>
        <td></td>
      </tr>
      <tr>
        <td>Weight</td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['company']; ?></td>
        <td></td>
      </tr>
      <tr>
        <td>Box Count</td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['company']; ?></td>
        <td></td>
      </tr> -->
    <?php  ?>
  </table>
</body>
</html>

<?php
mysqli_close($conn);
?>
