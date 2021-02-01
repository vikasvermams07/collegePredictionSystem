<?php session_start();?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php require_once('databaseconnection.php');?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <?php require_once('bootstrap.php');?>
        <script>
        function hideAndshowPassword(){
            
            var checkbox=document.getElementById("myCheck");
            if(checkbox.checked ===true){
                document.getElementById("exampleInputPassword1").setAttribute('type', 'text');
            }else{
             document.getElementById("exampleInputPassword1").setAttribute("type", "password");   
            }
            
            
            
        }
        
      
        </script>
    </head>
    <body>
        
        <div style="margin: 10%;" class="shadow p-3 mb-5 bg-white rounded" >
            <h2>LogIn into FutureInstisute</h2>
              <?php
   if(isset($_POST['submit'])){
       
       $sql="SELECT * FROM student_info WHERE username=:username AND password=:password";
       
       $stmt=$pdo->prepare($sql);
       
       $userName=$_POST['username'];
       $Password=$_POST['pass'];
       $stmt->execute([':username'=>$userName,':password'=>$Password]);
       $count=$stmt->rowCount();
       
       if($count==0){
           echo "<div class='alert alert-danger'>Enter Valid Username or Password</div>";
       }
       else{
           $_SESSION['username']=$userName;
           $_SESSION['password']=$Password;
           header('Location:HomePage.php');
       }
       
      
   }   
  ?>
        
        <form action="index.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Enter Username" required="">
    
  </div>
  <div class="form-group" id="container">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password" required="" style="display:inline-block ">
 
  
    <input type="checkbox" id="myCheck" onclick="hideAndshowPassword()" style="margin-top:10px"> Show Password
  
  </div>
            
            Forget Password ? Click <a href="ForgetPasswordForm.php">here</a><br><br>
 
            <button type="submit" class="btn btn-primary" name="submit">SignIn</button>
           <a href="RegistrationForm.php" style="font-decoration:none"> <button type="button" class="btn btn-primary" name="signup">SignUp</button></a>
</form></div>
      
      
       
    </body>
</html>
