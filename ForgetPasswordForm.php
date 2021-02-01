<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.ForgetPasswordForm
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    
    
    <body>
        
       
            <div style="margin: 10%;" class="shadow p-3 mb-5 bg-white rounded" >

                <h2>Re-Generate Password</h2>
  <?php 
                if(isset($_POST['submit'])){
                  
                   
                    $email= trim($_POST['email']);
                   
                    $Pass= trim($_POST['pass']);
                 
                    $cpass= trim($_POST['cpass']);
                    
                    if($Pass != $cpass){
                        echo "<div class='alert alert-danger'>Password and Confirm-Password should be same!</div>";
                    }else{
                          $_SESSION["update"]="update";
                          header("Location:index.php");
                          exit();
                    }
                }
   ?>
                <form action="ForgetPasswordForm.php" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Email" required="">

      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Enter New Password" required="">
      </div>

       <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="cpass" placeholder="Re-enter Password" required="">
       </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
               <a href="index.php" style="font-decoration:none"> <button type="button" class="btn btn-primary" name="signup">Back</button></a>
    </form></div>
      
    </body>
</html>
