<?php
include "header_two.php";
?>
    <div class="clearfix"></div>
    <section class="about py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <div class="about-w3layouts-info">

                <h3 class="title text-center mt-lg-5 mt-md-4 mt-sm-4 mt-3 mb-2"> Sign Up</h3>
                <div class="line-w3ls-title text-center mb-md-4 mb-sm-3 mb-3"></div>
                <div class="abut-wls-text col-lg-8 col-lg- offset-2 ">
                    <form action="#" method="post">
                        <div class="row ile-wls-contact-mid">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-forms">
                                <input type="text" name = "name" lass="form-control" placeholder="Name" required="">
                            </div>
                        </div>
                        <div class="row ile-wls-contact-mid">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-forms">
                                <input type="Email" name = "email" class="form-control" placeholder="Email" required="">
                            </div>
                        </div>

                        <div class="row ile-wls-contact-mid">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-forms">
                                <input type="password" name = "password" class="form-control" placeholder="Password" required="">
                            </div>
                        </div>
                         <div class="row ile-wls-contact-mid">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-forms">
                                <input type="password" name = "cpassword" class="form-control" placeholder="Confirm Password" required="">
                            </div>
                        </div>

                        <div class="row ile-wls-contact-mid">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-forms">
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" checked> Seller
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio"> Buyer
                                </label>
                            </div>
                        </div>

                        <div class="">
                            <button type="submit" class="btn sent-butnn btn-lg">Sign up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php



include "footer.php";
include "../omg.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){


      $email = $_POST["email"];
      $password=$_POST["password"];
      $name = $_POST["name"];
      $cpass = $_POST["cpassword"];


      echo $email;
      echo $password;
      echo $name;
      echo $cpass;




     if($password != $cpass){
        
       echo "<script>

            alert ('password did not match');



           </script>";

    }

     else  {


         $sql = "INSERT INTO BUYER (`NAME`,`PASSWORD`,`B_EMAIL`) VALUES ('$name','$password','$email')";
         $result = $conn->query($sql);

         if($conn)
         {
            echo "okay";
         }
         if($result){

             echo "<script>

            alert ('Inserted');



           </script>";

         }

         else {

             echo "<script>

            alert ('Sorry ! SOmething went wrong');



           </script>";
         }
         

         
    }






    }


























?>