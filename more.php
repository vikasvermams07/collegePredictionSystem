<?php session_start();

if($_SESSION['username']==null && $_SESSION['password']==null){
    
    header('Location:index.php');
}
?>
<?php require_once('databaseConnection.php');?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <?php require_once('bootstrap.php');?>
        <title></title>
      
        </head>
    <body>
         <?php require_once('navigation.php');?>
        <?php
                $sql="SELECT * FROM institute_info where type like :type";
               $stmt=$pdo->prepare($sql);
               $type='%'.$_POST['institutename'].'%';
               $stmt->execute([':type'=>$type]);
        
        ?>
           <div class="school" style="margin-top: 20px;">
        <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top:20px;">
            <h4><?php echo $_POST['institutename']?></h4>
        </div>
        <?php
   

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $id=$row['id'];
        $name=$row['name'];
        $city=$row['city'];
        $image=$row['profile_image'];
   

        ?>
         <div class="card" style="width: 14rem; height: 400px; float:  left;margin-left:26px;margin-bottom:  20px; " >
                <img src="data:image/jpeg;base64,<?php echo  base64_encode( $image ); ?>" class="card-img-top" alt="..." height="250px" width="100px" >
      <div class="card-body">
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
                <div class="card" style="width: 14rem; height: 400px;background:transparent ;margin-top: 20px;border: none;padding: 20px; ">
            <form action="more.php" method="post">
                <input type="hidden" value="Degree Colleges" name="institutename">
<!--            <button id="degreeMore" class="btn btn-primary" style="margin-top:70%;margin-left: 20%;border-radius: 100%;height:80px;width: 80px;font-size:15px">
               
                More<i class="fa fa-angle-double-right"></i>
           </button>-->
            </form>    
        </div>
        
        </div>
        
     
 
</script>
        <?php require_once('footer.php');?>
    </body>
</html>
