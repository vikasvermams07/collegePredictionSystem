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
       
        <title>Filter Page</title>
       
   <?php require_once('bootstrap.php');?>
        
    </head>
    <body>
 <?php require_once('navigation.php');?>       
      
        
      
        
        <!-- Institutes list-->
        
        <div class="school" style="margin-top: 20px;">
        <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top:20px;">
            <button type="button" class="btn btn-primary"><?php echo $_POST['city'];?></span></button>
             <button type="button" class="btn btn-primary"><?php echo $_POST['state'];?></span></button>
              <button type="button" class="btn btn-primary"><?php echo $_POST['option'];?></span></button>
             <button type="button" class="btn btn-primary"><?php echo $_POST['cast'];?></span></button>
             <button type="button" class="btn btn-primary"><?php echo $_POST['percentage'];?>%</span></button>
        </div>
        
                 <?php
         
$sql=null;


$city=$_POST['city'];
$state=$_POST['state'];
$type='%'.$_POST['option'].'%';
$cast=$_POST['cast'];
$percentage=$_POST['percentage'];

if($cast=='general'){
    $sql="SELECT * FROM institute_info where city=:city AND state=:state AND type like :type AND cutoff_general<=:percentage";
}
else if($cast=='obc'){
    $sql="SELECT * FROM institute_info where city=:city AND state=:state AND type=:type AND cutoff_obc<=:percentage";
}

else{
     $sql="SELECT * FROM institute_info WHERE city=:city AND state=:state AND type=:type AND cutoff_sc/st<=:percentage";
}


$stmt=$pdo->prepare($sql);
$stmt->execute([':city'=>$city,':state'=>$state,':type'=>$type,':percentage'=>$percentage]);
$count=$stmt->rowCount();

if($count===0){
    echo "<div class='alert alert-danger' style='margin:10px;'>No Result Found</div>";
}
else{
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
       <button style="background: transparent;outline: none;border:none"  > 
           <h6 class="card-title">
            <?php echo $name?></h6>
       </button>
    </form>
        <p class="card-text">location :<?php echo $city?></p>
        
      </div>
         
    </div>
            <?php
          
            
}}

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
        <?php require_once('footer.php');?>
    </body>
</html>
