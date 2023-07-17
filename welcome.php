<?php
session_start();
$customerid = $_SESSION['id'];
if(isset($_POST['company'])){
$server = "localhost";
$username = "root";
$password = "";
$dbname = "login_credentials";

$con = mysqli_connect($server, $username, $password, $dbname);

if(!$con){

    die("connection to this database is failed due to".
    mysqli_connect_error());
}
// echo "Sucess connecting to db";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // session_start();
    // $customerid = $_SESSION['id'];
    
    $date = $_POST['date'];
    $company = $_POST['company'];
    $owner  = $_POST['owner']; 
    $item  = $_POST['item'];
    $quantity  = $_POST['quantity'];
    $weight  = $_POST['weight'];
    $request  = $_POST['request'];
    $id  = $_POST['id'];
    $size  = $_POST['size'];
    $count  = $_POST['count'];
    $specification  = $_POST['specification'];
    $checklist  = $_POST['checklist'];

    if($customerid == "customer1")
    {
        $sql = "INSERT INTO `shipment` (`date`, `company`, `owner`, `item`, `quantity`, `weight`, `request`, `id`, `size`, `count`, `specification`, `checklist`) VALUES ('$date', '$company', '$owner', '$item','$quantity', '$weight', '$request', '$id', '$size', '$count' , '$specification', '$checklist');";
    echo $sql;
    }
    else if($customerid == "customer2"){
        $sql = "INSERT INTO `shipment2` (`date`, `company`, `owner`, `item`, `quantity`, `weight`, `request`, `id`, `size`, `count`, `specification`, `checklist`) VALUES ('$date', '$company', '$owner', '$item','$quantity', '$weight', '$request', '$id', '$size', '$count' , '$specification', '$checklist');";
    echo $sql;
    }
    // if($con->query($sql) == true)
    // {
    //     echo "successfully created";
    // } 
    // else{
    //     echo "Error: $sql<br>$con->error";
    // }
    
    
  
   
  
}
  mysqli_close($con);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        container{
            margin-left:auto;
            margin-right:auto;
        }
        table{
            margin-left:auto;
            margin-right:auto;
        }
        
        #subc{
            text-align: center;
            margin-top: 7px;
        }
        body{
            /* background-color:red; */
            background-image: linear-gradient(rgb(255, 152, 8),yellow, rgb(233, 233, 45),rgba(180, 232, 39, 0.868));
            background-repeat : no-repeat;
            background-attachment: fixed;
            height:100%;
            font-size: 20px;
        }
        input{
            font-size:20px;
            border: 1px solid black ;
            border-radius:4px;
        }
        table td{
            padding:5px;
        }
    </style>
</head>
<body>
   <div class="container">
    <h1 style="text-align: center;">Shipment details form</h1>
   
    <form method = "POST" action = "welcome.php">
    <table>
        <tr>
            <td>Order date</td>
            <td><input type="date" name = "date"></td>
        </tr>
        <tr>
            <td>Company</td>
            <td><input type="text" name = "company" pattern = "[a-zA-Z0-9]+" required></td>
        </tr>
        <tr>
            <td>Owner</td>
            <td><input type="text" name = "owner" pattern = "[a-zA-Z0-9]+" required></td>
        </tr>
        <tr>
            <td>item</td>
            <td><input type="text" name = "item" required></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><input type="number" name = "quantity" inputmode="numeric" required></td>
        </tr>
        <tr>
            <td>Weight</td>
            <td><input type="number" name = "weight" step = "0.01" required></td>
        </tr>
        <tr>
            <td>Request for Shipment</td>
            <td><input type="text"  name = "request" required></td>
        </tr>
        <tr>
            <td>Tracking id</td>
            <td><input type="text" name = "id" required></td>
        </tr>
        <tr>
            <td>Shipment size</td>
            <td><input type="number" name = "size" required></td>
        </tr>
        <tr>
            <td>Box count</td>
            <td><input type="number" name = "count" inputmode="numeric" required></td>
        </tr>
        <tr>
            <td>Specification</td>
            <td><input type="text" name = "specification" required ></td>
        </tr>
        <tr>
            <td>Checklist Quantity</td>
            <td><input type="text" name = "checklist" required></td>
        </tr>
            
</table>
<div id ="subc"><input id = "sub" type="submit"/></div>
</form>
   </div> 

</body>
</html>