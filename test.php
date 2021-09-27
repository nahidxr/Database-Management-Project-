<?php

     include('omg.php');
     include("lr.php");
      $id=$_POST['landId'];

      $year=$_POST['year'];

      $sql="Select * from land where `land_id`=$id";
      $result=$conn->query($sql);
      
       if($result->num_rows == 1)
       {  
      $cursor=$result->fetch_assoc();    
      $land_prices=array($cursor['LAND_PRICE_2015'],$cursor['LAND_PRICE_2016'],$cursor['LAND_PRICE_2017'],$cursor['LAND_PRICE_2018'],$cursor['LAND_PRICE_2019']);
       echo json_encode( lr($land_prices,$year));
     //echo  $land_prices;
     }


     else
     {
        echo "404";
     }
     
     



?>