<?php

session_start();

include("omg.php")
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <style type="text/css">
    body
    {
      background-image: url("ab1.jpg");
    }
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
  	 	

  	 }
  	 .single-message
  	 {
  	 	padding: 10px;
  	 	margin: 10px;
  	 }
  	 form
  	 {
  	 	border: 6px double black;
  	 	padding: 30px;
  	 }
  </style>
</head>

<body>





<div  class="container form-container center max-width-600 top-mar-100" >
	<div class="icon-btn" style="margin-bottom: 10px; text-align: right;">
	<span>	
   <?php
      echo $_SESSION['user']["NAME"];
   
  ?>
  </span>  
    <i class="fas fa-user-circle" style="font-size: 45px;"></i>
	</div>

<div class="notification" style="display: none;">
	Notifications

	<div style="
  	 
  	 	border: 6px double black;
  	 	padding: 30px;
  	 	margin-bottom: 30px;
      background-color: #35c7ffeb;
  	 ">

     <?php

         if(isset($_SESSION['user']['S_EMAIL']))
         {
           $email=$_SESSION['user']['S_EMAIL'];
            $sql="Select * from interest Inner JOIN land On land.land_id=interest.land_id where interest.s_email = '$email'" ;
            $result=$conn->query($sql);

            for($c=0;$c<$result->num_rows;$c++)
            {
              $cursor=$result->fetch_assoc();
              //var_dump($cursor);
              ?>
               <div class="single-message">
                <div>
                Interested User's email:<?php  echo $cursor['B_EMAIL']; ?>
               </div> 
               <div>
                Time: <?php echo $cursor['INTEREST_TIME']?>
               </div>
               <div>
                <span>Land Information</span>
                <div>
                Land place:<?php echo $cursor['LAND_pLACE'];?> 
                </div>
                <div>
                Land road: <?php echo $cursor['LAND_ROAD'];?>
                </div>
                <div>
                Land acre: <?php echo $cursor['ACRE']; ?>
                </div>

               </div>
               </div>
              <?php
              
            }

         }
           
        
         


     ?>
  	 

  	 
  	 
  	 
		
	</div>
</div>



<?php
  if(isset($_SESSION['user']['B_EMAIL'])){

 ?>
<form action="index.php" method="post" style="background-color: #35c7ffeb;">
  <div class="form-group">
    <label for="exampleInputEmail1"> Place</label>
    <input type="text" class="form-control" name="place" placeholder="Enter place">
 </div>
 <div class="form-group">
    <label for="exampleInputEmail1"> Acre</label>
    <input type="text" class="form-control" name="acre" placeholder="Enter Acre">
 </div>
 <div class="form-group">
    <label for="exampleInputEmail1"> Price Range</label><br/>
    <label for="exampleInputEmail1"> From</label>
    <input type="number" class="form-control" name="from" >
    <label for="exampleInputEmail1"> To</label>
    <input type="number" class="form-control" name="to" >
 </div>
  <button type="submit" class="btn btn-primary">Search</button>
</form>
</div>
<?php
} 
?>

<script>

    var flag=false;

	$(".icon-btn").click(function(){
         
         if(!flag)
         {
            $(".notification").fadeIn();
            flag=true;
         }
         else
         {
             $(".notification").fadeOut();
            flag=false; 
         }
		
	})
	</script>






</body>
</html>