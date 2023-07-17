<?php
if(isset($_POST['id'])){
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
    $id = $_POST['id'];
    $pass = $_POST['pass'];
  
    // Query the auth table
    $query = "SELECT * FROM users WHERE id = '$id' AND pass = '$pass'";
    $result = mysqli_query($con, $query);
  
    if (mysqli_num_rows($result) == 1) {
      // Successful login
      echo "loged in sucessfully";
      session_start();
      $_SESSION["id"] = $id;
      if($id == "customer1" || $id == "customer2")
      {
          header("Location: welcome.php"); // Redirect to welcome.php
      } 
      elseif($id == "admin"){
        header("Location: admin.php");
      } 
      exit();
    } else {
      // Invalid credentials
       
    }
    
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
        body{
            /* background-color: #97d7f7;
             */
            background-image: linear-gradient(rgb(255, 152, 8),yellow, rgb(233, 233, 45),rgba(180, 232, 39, 0.868));
            background-repeat : no-repeat;
            background-attachment: fixed;

        }
        .container{
            text-align: center;
        }
        table {
            margin-left:auto;
            margin-right:auto;
        }
        table td{
            font-size:22px;
            text-align: left;
            padding: 10px;
            /* background-color: red; */
        }
       
        .inputfield{
            width: 300px;
            height:24px;
            font-size:18px;
            border-radius:4px;
            border:none;
            box-shadow: 2px 2px 5px #302929;
            outline :  none;
            
        }
        .inputfield :focus{
            border : none;
            background-color: red;
            outline:none;
        }
        #sub{
            font-size: 18px;
            width:100px;
            height: 24px;
            background-color: rgb(0, 55, 255);
            color: white;
            border:none;
        }
        #sub:hover{
            
            background-color: rgba(11, 88, 205, 0.765);
            color:white;
            transition : 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="heading">Login/Signup</h1>
        <div class="inp">
            <form method = "POST" action = "index.php" >
            <table>
                <tr>
                    <td>Id     :  </td>
                    <td><input class = inputfield id="id" type="text" name = "id" required placeholder="Id"/></td>
                </tr>
                <tr>
                    <td>password:</td>
                    <td><input class = inputfield id = "pass" type = "password" required name = "pass" placeholder = "password"/></td>
                </tr>
               
            </table>
            <div class="sub">
                <input id = "sub" type = "submit" value = "submit"/>
            </div>
        </form>
            <br>    
        </div>
    </div>
</body>
</html>
