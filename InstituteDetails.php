<?php session_start();

if($_SESSION['username']==null && $_SESSION['password']==null){
    
    header('Location:index.php');
}?>
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
        <title>institute Page</title>
       <?php require_once('bootstrap.php');?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    
    </head>
    <body>
        <?php require_once('navigation.php');?>
        
        <?php 
       
        $sql="SELECT * FROM institute_images where id=:id";

$stmt=$pdo->prepare($sql);
$id= $_POST['val'];
$stmt->execute([':id'=>$id]);
$row=$stmt->fetch(PDO::FETCH_ASSOC);
        
       $image1=$row["image1"];
       $image2=$row["image2"];
       $image3=$row["image3"];
       $image4=$row["image4"];
       $image5=$row["image5"];
 
        ?>
        
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 500px;">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    
    <div class="carousel-item active" style="height: 500px">
        <img class="d-block w-100" src="data:image/jpeg;base64,<?php echo  base64_encode( $image1 ); ?>"alt="First slide" style="height: 500px">
    </div>
      
   <div class="carousel-item" style="height: 500px">
       <img class="d-block w-100" src="data:image/jpeg;base64,<?php echo  base64_encode( $image2 ); ?>" alt="Second slide" style="height: 500px">
    </div>
      
    <div class="carousel-item" style="height: 500px">
        <img class="d-block w-100" src="data:image/jpeg;base64,<?php echo  base64_encode( $image3 ); ?>" alt="Third slide" style="height: 500px">
    </div>
      
   <div class="carousel-item" style="height: 500px">
       <img class="d-block w-100" src="data:image/jpeg;base64,<?php echo  base64_encode( $image4 ); ?>" alt="Fourth slide" style="height: 500px">
    </div>
    
    <div class="carousel-item" style="height: 500px">
       <img class="d-block w-100" src="data:image/jpeg;base64,<?php echo  base64_encode( $image5 ); ?>" alt="Fourth slide" style="height: 500px">
    </div>
      
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        
         <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top:20px;">
            <h4>College Information</h4>
        </div>
        
        
        <?php 
        
        $sql1="SELECT * FROM institute_info where id=:id";
        
        $stmt1=$pdo->prepare($sql1);
        $id1= $_POST['val'];
        $stmt1->execute([':id'=>$id1]);
        $info=$stmt1->fetch(PDO::FETCH_ASSOC);
        
        $name=$info['name'];
        $address=$info['address'];
        $offemail=$info['mail_id'];
        $offcontact=$info['contact_no'];
        $website=$info['website'];
        ?>
       <table class="table" style="background: white;">
  <tbody>
    <tr>
     
      <td>Name</td>
      <td><?php echo $name?></td>
      
    </tr>
    <tr>
      
      <td>Address</td>
      <td><?php echo $address?></td>
      
    </tr>
     <tr>
      
      <td>Official Mail Id</td>
      <td><?php echo $offemail?></td>
      
    </tr>
     <tr>
      
      <td>Contact Number</td>
      <td><?php echo $offcontact?></td>
      
    </tr>
    <tr>
      
      <td>Official Site</td>
      <td><a href="https://<?php echo $website?>" target="_blank">webSite</a></td>
      
    </tr>
   
  </tbody>
</table>
        <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top:20px;">
            <h4>Cource Information</h4>
        </div>
        <?php
     $query="SELECT * FROM course_info where InstituteId=:id";
   
     $statement=$pdo->prepare($query);
     $statement->execute([':id'=>$id1]);
    $trowcount=$statement->rowCount();

      
        
        ?>
        <div id="divname">
            <table class="table" style="background: white;text-align: center" id="editor">
  <thead>
    <tr>
      <th scope="col">Sr no.</th>
      <th scope="col">Course Name</th>
      <th scope="col">Couse Duration</th>
      <th scope="col">CutOff marks </th>
      <th scope="col">Course Fees per Year</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    while($row=$statement->fetch(PDO::FETCH_ASSOC)){
        
        ?>
      <tr >
        <td><?php echo $i; ?></td>
        <td><?php echo $row['CourseName'];?></td>
        <td><?php echo $row['Duration'];?></td>
        <td><?php echo $row['CuttoffMarks'];?>%</td>
        <td><?php echo $row['Fees'];?></td>
        
    </tr>
    <?php
    $i++;
    }
   
    ?>
  </tbody>
  
</table>
            
</div>
        <?php if($trowcount>0){?>
  <div>
      <button id="btnExport" value="Export" class="btn btn-primary" style="float:right;margin-right:  10px" onclick="Export()">Save as PDF</button>
    <button onclick="printDiv('divname');" class="btn btn-primary" style="float:right;margin-right:  10px">Print</button>
      
  </div>
        <?php }?>
        <script>
            
 function Export() {
            html2canvas(document.getElementById('editor'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("FutureInstitute.pdf");
                }
            });
        }

      function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
        </script>
        

        
     <?php 
    $number=0;
   
        if(isset($_POST["btncomment"])){
            
            $sql5="INSERT INTO comments (student_id,institute_id,comment,student_name,student_profile) VALUES(:stid,:insid,:comment,:name,:profile)";
            
            $commentstmt=$pdo->prepare($sql5);
            $studentid=$stid;
            $insid=$id1;
            $comment=$_POST['mycomments'];
           
            $studentName=$stname." ".$surname;
           $commentstmt->execute([':stid'=>$stid,':insid'=>$insid,
               ':comment'=>$comment,':name'=>$studentName,':profile'=>$profile]);
           $number=$commentstmt->rowCount();
    
           
        }
        
        ?>
        <h4 style="margin:20px; ">Add Comments</h4>
      
        
        
        <div  style="margin:20px">
            <img src="data:image/jpeg;base64,<?php echo  base64_encode( $profile ); ?>" style="border-radius:100px;height:70px;width:70px;float: left">
            <div style="">
            <form action="InstituteDetails.php" method="post">
                <input type="hidden" value="<?php echo $id1?>" name="val">   
                <textarea class="addcommets" name="mycomments" placeholder="Leave Comments" id="comment" required="" style="margin-top: 20px"></textarea><br>
            <button name="btncomment" tyep="button" class="btn btn-primary" style="margin-left: 535px;" id="btnsub">Submit</button>
            </form>
           </div>
        </div>
        
    
   <?php
   
   $sql4="SELECT * FROM comments where institute_id=:id";
        
        $stmt4=$pdo->prepare($sql4);
        
        $stmt4->execute([':id'=>$id1]);
        $count=$stmt4->rowCount();
        ?>
        <div class="shadow p-3 mb-5 bg-white rounded" >
            <h4><?php echo $count;?> Comments</h4>
        </div>
        <?php
        ?>
        
        <table style="background-color:white;width: 100%;padding: 10px ">   
            
         <?php
        while($info4=$stmt4->fetch(PDO::FETCH_ASSOC)){
            $comment=$info4['comment'];
            $profile=$info4['student_profile'];
            $stname=$info4['student_name'];
        
   ?>     
  
            <tr style="border-bottom: 2px solid whitesmoke">
         <td style="width: 100px"><div style="margin-bottom:10px;margin-left: 20px;"> <img src="data:image/jpeg;base64,<?php echo  base64_encode( $profile ); ?>" style="border-radius:100px;height:50px;width:50px;"></div></td>
    <td> 
        
        <div >
          <div ><label style="font-weight: bold"><?php echo $stname;?></label></div>
         <div >
         <p> <?php echo $comment;?></p>
        </div>
    </div>   
    </td>
    
    </tr>    
 
     <?php 
        }?>  
            
        </table>
        <?php require_once('footer.php');?>
    </body>
</html>
