<?php
include ("omg.php");
include "functions.php";
if(send_notification($_POST['buyer_email'],$_POST['seller_email'],$_POST['land_id'],$conn))
{
  echo "Succesfull";
}
else
{
  echo "Failed";
}




?>