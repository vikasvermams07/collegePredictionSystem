<?php session_start();

if($_SESSION['username']==null && $_SESSION['password']==null){
    
    header('Location:index.php');
}
?>
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

        <title>Home Page</title>
          <?php require_once('bootstrap.php');?>
        <style>
           
        </style>
    </head>
    <body>
                      <?php 
             
               if(isset($_POST['updateInfo'])){
              $stid= trim($_POST['studenId']);
                  
              $StudentName= trim($_POST['stfirstname']);
                  
              $SureName= trim($_POST['stlastname']);
              
              $MailId=trim($_POST['stemailid']);
              
              $ContactNumber= trim($_POST['stcontactnumber']);
              
              $update="UPDATE student_info SET name=:NAME,surname=:SURNAME,mail_id=:MAIL,contact_no=:CONTACT WHERE id=:ID;UPDATE comments SET student_name=:NAME WHERE student_id=:ID";
              $updatestmt=$pdo->prepare($update);
              
              
              
              $updatecount=$updatestmt->execute([':NAME'=>$StudentName,':SURNAME'=>$SureName,':MAIL'=>$MailId,':CONTACT'=>$ContactNumber,':ID'=>$stid]);
              
           
              header('Location:HomePage.php');
              
               }
              ?>
        <?php require_once('navigation.php');?>  
        
        
              
       
        <div class="school" style="margin-top: 20px;">
        <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top:20px;">
            <h4>Schools</h4>
        </div>
       

 <?php
         

$sql="SELECT * FROM institute_info where type like :type";

$stmt=$pdo->prepare($sql);
$type='%school%';
$stmt->execute([':type'=>$type]);
$rowcount=$stmt->rowCount();


while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $id=$row['id'];
        $name=$row['name'];
        $city=$row['city'];
        $image=$row['profile_image'];
   

        ?>
         
         <div class="card " style="width: 14rem; height: 400px; float:  left;margin-left:26px;margin-bottom:  20px; " >
                <img src="data:image/jpeg;base64,<?php echo  base64_encode( $image ); ?>" class="card-img-top" alt="..." height="250px" width="100px" >
      <div class="card-body ">
     <form action="InstituteDetails.php" method="POST">
         <input type="hidden" value="<?php echo $id?>" name="val">
         <button style="background: transparent;outline: none;border:none;" class="btnschool"> 
           <h6 class="card-title">
            <?php echo $name?></h6>
       </button>
    </form>
        <p class="card-text">location :<?php echo $city?></p>
        
      </div>
         
    </div>
               
            <?php
          
            
        }
        ?>
        
        <div class="card" style="width: 14rem; height: 400px;background:transparent;margin-top: 20px;border: none;padding: 20px; ">
            <form action="more.php" method="post">
                <input type="hidden" value="school" name="institutename">  
            <button class="btn btn-primary" style="margin-top:70%;margin-left: 20%;border-radius: 100%;height:80px;width: 80px;font-size:15px">
               
                More<i class="fa fa-angle-double-right"></i>
            </button>
            </form>
        </div>
       
            <div></div>
        </div>
        
        
        
        
  <div class="college">
            
        <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top:50px;">
            <h4>Colleges</h4>
        </div>
      
     
             <?php
        

$sql1="SELECT * FROM institute_info where type like :type";

$stmt1=$pdo->prepare($sql1);
$type1='%college%';
$stmt1->execute([':type'=>$type1]);

while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
        $name1=$row1['name'];
        $city1=$row1['city'];
        $image1=$row1['profile_image'];
         $id1=$row1['id'];
   

        ?>
         <div class="card" style="width: 14rem; height: 400px; float:  left;margin-left:26px;margin-bottom:  20px; " >
                <img src="data:image/jpeg;base64,<?php echo  base64_encode( $image1 ); ?>" class="card-img-top" alt="..." height="250px" width="100px" >
      <div class="card-body">
         <form action="InstituteDetails.php" method="POST">
         <input type="hidden" value="<?php echo $id1?>" name="val">
         <button style="background: transparent;outline: none;border:none;" class="btnschool"> 
           <h6 class="card-title">
            <?php echo $name1?></h6>
       </button>
    </form>
        <p class="card-text">location :<?php echo $city1?></p>
      </div>
         
    </div>
            <?php
          
            
        }
        ?>
        <div class="card" style="width: 14rem; height: 400px;background:transparent;margin-top: 20px;border: none;padding: 20px; ">
            <form action="more.php" method="post">
                <input type="hidden" value="college" name="institutename">  
            <button class="btn btn-primary" style="margin-top:70%;margin-left: 20%;border-radius: 100%;height:80px;width: 80px;font-size:15px">
               
                More<i class="fa fa-angle-double-right"></i>
           </button>
            </form>
        </div>
  </div>
        
    
        
        
        <div style="margin-top: 20px;" class="university">
        <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top:20px;">
            <h4>Degree Colleges</h4>
        </div>
        <?php
         

$sql2="SELECT * FROM institute_info where type like :type";

$stmt2=$pdo->prepare($sql2);
$type2='%degree%';
$stmt2->execute([':type'=>$type2]);
$count=$stmt2->rowCount();
if($count === 0){
    ?>
            <script>
            document.getElementById("degreeMore").style.display="none";
            </script>       
 <?php
}
while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
        $name2=$row2['name'];
        $city2=$row2['city'];
        $image2=$row2['profile_image'];
        $id2=$row2['id'];
   

        ?>
         <div class="card" style="width: 14rem; height: 400px; float:  left;margin-left:26px;margin-bottom:  20px; " >
                <img src="data:image/jpeg;base64,<?php echo  base64_encode( $image2 ); ?>" class="card-img-top" alt="..." height="250px" width="100px" >
      <div class="card-body">
         <form action="InstituteDetails.php" method="POST">
         <input type="hidden" value="<?php echo $id2?>" name="val">
         <button style="background: transparent;outline: none;border:none;" class="btnschool"> 
           <h6 class="card-title">
            <?php echo $name2?></h6>
       </button>
    </form>
          <p class="card-text">location :<?php echo $city2?></p>
      </div>
         
    </div>
            <?php
          
            
        }
        ?>
        <div class="card" style="width: 14rem; height: 400px;background:transparent ;margin-top: 20px;border: none;padding: 20px; ">
            <form action="more.php" method="post">
                <input type="hidden" value="Degree Colleges" name="institutename">
            <button id="degreeMore" class="btn btn-primary" style="margin-top:70%;margin-left: 20%;border-radius: 100%;height:80px;width: 80px;font-size:15px">
               
                More<i class="fa fa-angle-double-right"></i>
           </button>
            </form>    
        </div></div>
    


        
       <?php require_once('footer.php');?>
    </body>
    
</html>
