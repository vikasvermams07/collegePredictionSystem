
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php require_once('databaseConnection.php');?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
       
        <title></title>
        <script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            };
 
            reader.readAsDataURL(file);
        }
    }
</script>
    </head>
    <body>
        <div style="margin: 10%;" class="shadow p-3 mb-5 bg-white rounded" >
            
            <h2>Register into FutureInstisute</h2>
            <?php
            
 if(isset($_POST['submit'])){
   
   $firstName=trim($_POST['first']);
   $lastName= trim($_POST['last']);
   $userName=trim($_POST['username']);
   $contact=trim($_POST['mobileno']);
   $emailId= trim($_POST['email']);
   $Password=trim($_POST['pass']);
   $ConfirmPassword= trim($_POST['cpass']);
   $imagePost=$_FILES['imagePost']['tmp_name'];
    
   echo $imagePost;

   if($Password != $ConfirmPassword){
        echo "<div class='alert alert-danger'>Password and Confirm-Password should be same!</div>";
   }
   else if($userName==$Password){
         echo "<div class='alert alert-danger'>Username and Password should not be same!</div>";
   }
   else{
       $sql="INSERT INTO student_info (profile_image,name,surname,mail_id,contact_no,username,password) VALUES (:img,:name,:surname,:mail,:contact,:username,:password)";
   $stmt=$pdo->prepare($sql);
   $fp = fopen($imagePost, 'rb');
   echo $fp;
   $img=$stmt->bindParam(1, $fp, PDO::PARAM_LOB);
   
   $stmt->execute([':img'=>$img,':name'=>$firstName,':surname'=>$lastName,
                   ':mail'=>$emailId,':contact'=>$contact,
                    ':username'=>$userName,':password'=>$Password]);
      
   }
 }?>    
            <form action="RegistrationForm.php" method="POST">
  <div class="form-group">
  <center> <div class="form-group">
          <div style="border-radius: 100%;height: 120px;width: 120px;margin-bottom: 10px">
              <img src="avtar.jpg" id="previewImg" style="border-radius: 100%;height: 120px;width: 120px;">
          </div>
    
    <input type="file" name="imagePost"  required="" accept="image/jpeg">
    
  </div></center>
    <div class="form-group">
    <label for="Fist Name">First Name</label>
    <input type="text" class="form-control" id="first" name="first" placeholder="Enter First Name" required="" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
  </div>
     <div class="form-group">
    <label for="Last Name">Last Name</label>
    <input type="text" class="form-control" id="last" name='last' placeholder="Enter Last Name" required="" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
  </div>  
    <div class="form-group">
    <label for="Username">Username</label>
    <input type="text" class="form-control" id="username" name='username' required="" placeholder="Enter Username">
  </div>
    <label for="exampleInputEmail1">Email Address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email' required="" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Mobile Number</label>
    <input type="text" class="form-control" id="exampleInputMobile" name='mobileno' required="" placeholder="Enter Mobile no." onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
    <small id="emailHelp" class="form-text text-muted">We'll never share your mobile number with anyone else.</small>
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name='pass' required="" placeholder="Enter Password">
  </div>
  <div class="form-group">
    <label for="exampleInputConfirmPassword1">Confirm-Password</label>
    <input type="password" class="form-control" id="exampleInputConfirmPassword2" name='cpass' required="" placeholder="Re-enter Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <a href="index.php" style="font-decoration:none"><button type="button" name="back" class="btn btn-primary">Back</button></a>
</form></div>
        
    
    </body>
</html>
