<?php
include "header_one.php";
?>
<div class="clearfix"></div>
    <section class="about py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <div class="about-w3layouts-info">

                <h3 class="title text-center mt-lg-5 mt-md-4 mt-sm-4 mt-3 mb-2"> Sign In</h3>
                <div class="line-w3ls-title text-center mb-md-4 mb-sm-3 mb-3"></div>
                <div class="abut-wls-text col-lg-8 col-lg- offset-2 ">
                    <form action="#" method="post">
                        <div class="row ile-wls-contact-mid">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-forms">
                                <input type="Email" name = "email" class="form-control" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="row ile-wls-contact-mid">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-forms">
                                <input type="Password" name = "password" class="form-control" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="row ile-wls-contact-mid">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-forms">
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" value="seller" checked> Seller
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" value="buyer"> Buyer
                                </label>
                            </div>
                        </div>

                        <div class="">
                            <button type="submit" class="btn sent-butnn btn-lg">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php






include "../omg.php";




if ($_SERVER["REQUEST_METHOD"] == "POST"){

     $email = $_POST["email"];
     $password=$_POST["password"];
     $user_type=$_POST['optradio'];
     loginseller($email,$password,$conn,$user_type);


}

 











function loginseller($email,$password,$conn,$user_type){

 if($user_type=='seller')
 {
   $sql = "select * from seller where `S_EMAIL` = '$email' and `PASSWORD` = '$password'";
 $result = $conn->query($sql);
 if($result->num_rows == 1)
 {
   
   $_SESSION["user"]=$result->fetch_assoc();
   $_SESSION["user_type"]="seller";
   header('Location:http://localhost/tasin/search.php') ;
 }
 else
 {
   echo "ERROR_404" ;
 }   
 }
 else
 {
    $sql = "select * from buyer where `B_EMAIL` = '$email' and `PASSWORD` = '$password'";
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
  
}





















include "footer.php";
?>