<!DOCTYPE html>
<html>
<head>
  <title>Login</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <style type="text/css">
    .center
    {
      margin: auto;
  
    }
    .max-width-600
    {
      max-width: 400px;

     }
     .top-mar-100
     {
        margin-top:100px;    
     }
     .form-container
     {
      border: 5px solid black double;
      background-color: 
     }
     form
     {
      border: 6px double black;
      padding: 30px;
     }
  </style>
</head>

<body>
 
  
<div  class="container form-container center max-width-600 top-mar-100 ">

<form action="loginbuyer.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1"> Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email">
 
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <input type="submit" class="btn btn-primary"  name="submit" value = "Login" />
  
</form>

</div>
  
  

</body>
</html>

<?php 

session_start();
include("omg.php"); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
 $email = $_POST["email"];
 $password=$_POST["password"];


 $sql = "select * from buyer where `B_EMAIL` = '$email' and `PASSWORD` = '$password'";

 echo 'this is login as buyer: ',$sql.'<br>';
 $result = $conn->query($sql);






 



 if($result->num_rows == 1)
 {
   
   $_SESSION["user"]=$result->fetch_assoc();
   $_SESSION["user_type"]="buyer";
   header('Location:http://localhost/tasin/search.php') ;
 }
 else
 {
   echo "ERROR_404" ;
 } 
}

?>

