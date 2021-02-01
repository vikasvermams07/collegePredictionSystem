
<?php require_once('databaseConnection.php');?>
<?php require_once('bootstrap.php');?>
     <script>
         function myfunction(){
            
            
            if(window.confirm('are you sure to want to LogOut')){
               window.open("logoutPage.php", "Thanks for Visiting!");
            }
         }
         
         
                              
           function editInfo(){
               
               var elems=document.querySelectorAll("#fname,#lname,#number,#mail");
                for (var i=0; i<elems.length; i++) {
               elems[i].removeAttribute("disabled");
               elems[i].style.border="1px solid";
               elems[i].style.outline="none";
           }
               
               document.getElementById("edit").style.display ='none';
               document.getElementById("upload").removeAttribute("disabled");
                document.getElementById("cancel").style.display="block";
          
    }
    
    
    function cancelBtn(){
        
        var elems=document.querySelectorAll("#fname,#lname,#number,#mail");
                for (var i=0; i<elems.length; i++) {
               elems[i].disabled=true;
               elems[i].style.background='none';
               elems[i].style.outline='none';
               elems[i].style.border="none";
           }
          
          document.getElementById("upload").disabled=true;
           document.getElementById("edit").style.display ='block';
          document.getElementById("cancel").style.display="none";
          
          
    }
    
//  function myRadioButton(e){
//      
//      switch(e){
//          case 'school':
//              document.getElementById('cource').style.display='none';
//              document.getElementById('year').style.display='none';
//              document.getElementById('standard').style.display='block';
//              break;
//          case 'college':
//              document.getElementById('year').style.display='block';
//              document.getElementById('standard').style.display='none';
//              document.getElementById('cource').style.display='none';
//              break;
//          case 'university':
//             document.getElementById('standard').style.display='none';
//             document.getElementById('cource').style.display='block';
//             document.getElementById('year').style.display='none';
//              break;
//          default:
//              alert("nothing is selecte");
//      }
//      
//  }
         </script>
  <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark" >
             <a class="navbar-brand" href="HomePage.php">Future Institute</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form name="myform" action="Filter_Page.php" method="post">
       
         <div  class="modal-body"> 
                <label>State</label>
          <select name="state" class="form-control" required="">
              <option value="">--select option--</option>
              <option value="maharashtra">Maharashtra</option>
              <option value="mp">Madhya Pradesh</option>
              
          </select>

         </div>   
         <div  class="modal-body"> 
                <label>City</label>
          <select name="city" class="form-control" required="">
              <option value="">--select option--</option>
              <option value="navi mumbai">Navi Mumbai</option>
              <option value="pune">Pune</option>
              <option value="bhopal">Bhopal</option>
              <option value="indore">Indore</option>
          </select>

         </div>

     <div class="modal-body">
         <label>Looking For</label><br>
         <label class="radio-inline"><input type="radio" name="option" id="school" value="school" onchange="myRadioButton(this.id)" required=""> School</label>
                      
         <label class="radio-inline"><input type="radio" name="option" id="college" value="college" onchange="myRadioButton(this.id)" required=""> College</label>
            
         <label class="radio-inline"><input type="radio" name="option" id="university"value="degree" onchange="myRadioButton(this.id)" required=""> Degree College</label>
             
       </div>
<!--       <div class="modal-body" style="display:none" id="cource">
          <label>Cource</label>
          <select name="cources" class="form-control" required="">
              <option>--select option--</option>
              <option value="bsccs">Bsc CS</option>
              <option value="bscit">Bsc IT</option>
              <option value="bcom">Bcom</option>
          </select>
      </div>
       <div class="modal-body" style="display:none" id="year">
          <label>Year</label>
          <select name="year" class="form-control" required="">
              <option >--select option--</option>
              <option value="bsccs">11th</option>
              <option value="bscit">12th</option>
          </select>
      </div>
        <div class="modal-body" style="display:none" id="standard">
            <label>Medium</label>
          <select name="medium" class="form-control" required="">
              <option >--select option--</option>
              <option value="bsccs">Hindi</option>
              <option value="bscit">English</option>
              <option value="bcom">Marathi</option>
          </select>  
          <label>Standard</label>
          <select name="standard" class="form-control" required="">
              <option >--select option--</option>
              <option value="bsccs">8</option>
              <option value="bscit">9</option>
              <option value="bcom">10</option>
          </select>
        </div>-->
            <div  class="modal-body"> 
                <label>Cast</label>
          <select name="cast" class="form-control" required="">
              <option value="">--select option--</option>
              <option value="general">General</option>
              <option value="obc">OBC</option>
              <option value="sc/st">SC/ST</option>
          </select>

            </div>
        <div class="modal-body">
          <label>Percentage</label>
          <input type="text" class="form-control" name="percentage" placeholder="Pertcentage" required="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
   </form>
    </div>
  </div>
</div>
  
      <!--Navigation bar-->
      
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <a class="nav-link" href="HomePage.php">
          Home
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          About us
        </a>
      </li>
      <li class="nav-item">
          <button type="button" class="nav-link" data-toggle="modal" data-target="#exampleModal" style="background:transparent;outline: none;border: none;">
                <i class="fa fa-filter" style="font-size:18px">filter</i>
       </button>
      </li>
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php 
                $stid=0;
                $fname=null;
                $stname=null;
                $surname=null;
                $mail=null;
                $number=0;
                $profile=null;
      if($_SESSION['username']!=null &&  $_SESSION['password']!=null){
          $sql="SELECT * FROM student_info WHERE username=:username AND password=:password";
          $userName=$_SESSION['username'];
          $Password=$_SESSION['password'];
          
          $stmt=$pdo->prepare($sql);
          
          $stmt->execute([':username'=>$userName,':password'=>$Password]);
          
          if($row=$stmt->fetch(PDO::FETCH_ASSOC)){
              $stid=$row['id'];
                $fname=$row['name'];
                $stname=$row['name'];
                $surname=$row['surname'];
                $mail=$row['mail_id'];
                $number=$row['contact_no'];
                $profile=$row['profile_image'];
                ?>
            <img class="avatar" src="data:image/jpeg;base64,<?php echo  base64_encode( $profile ); ?>" alt="avtar" 
                 style="border-radius: 100%;height: 40px;width: 40px"> <b><?php echo $stname;?> <?php echo $surname;?></b>
        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width:300px;padding: 20px">
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
       
              <form class="form-group" action="HomePage.php" method="POST">
                <center>  <img class="avatar" src="data:image/jpeg;base64,<?php echo  base64_encode( $profile ); ?>" alt="avtar" 
                 style="border-radius: 100%;height: 70px;width: 70px;margin: 10px" id="previewImg">
                    <input type="file" name="photo" onchange="previewFile(this)" required="" accept="image/jpeg">
                </center>
                  <input type="hidden" name="studenId" value="<?php echo $stid;?>">
                  
              <div class="form-group">
                 <label for="Fist Name" class="dropdown-item-text">First Name</label>
                 <input required="" name="stfirstname" type="text" value="<?php echo $stname;?>" class="dropdown-item form-control" id="fname" disabled="" style="background: transparent;" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
              </div>
              
            
             <div class="form-group">
                 <label for="Last Name" class="dropdown-item-text">Last Name</label>
                 <input required="" name="stlastname" type="text" value="<?php echo $surname;?>" class="dropdown-item form-control"  id="lname" disabled="" style="background: transparent;border: none;" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
             </div>

            <div class="form-group">
                 <label for="Contact Number" class="dropdown-item-text">Phone Number</label>
                 <input required="" name="stcontactnumber" type="text" value="<?php echo $number;?>" class="dropdown-item form-control" id="number" disabled="" style="background: transparent;border: none;" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
             </div>
            
            <div class="form-group">
                 <label for="Mail ID" class="dropdown-item-text">Mail id</label>
                 <input required="" name="stemailid" type="email" value="<?php echo $mail;?>" class="dropdown-item form-control" id="mail" disabled="" style="background: transparent;border: none;">
              
            </div>
           
             
          <div class="dropdown-divider"></div>
          
          <button name="updateInfo" type="submit" id="upload" style="display: block;float: left;margin-right: 10px" disabled="" class="btn btn-primary">
               Update <i class="fa fa-upload" style="font-size:24px"></i>
          </button>
          
          <button  type="button" id="edit" onclick="editInfo()" class="btn btn-primary" >
               Edit <i class="fa fa-edit" style="font-size:24px"></i>
           </button>
                
          
          <button type="button" id="cancel" style="display: none" onclick="cancelBtn()" class="btn btn-secondary">
               Cancel <i class="fa fa-close" style="font-size:24px"></i>
           </button>
         </form>
        </div>
      </li>
      
      <?php
           }
      } 
      ?>
          
     
    </ul>
    
    
      <form class="form-inline my-2 my-lg-0" action="searchResult.php" method="POST">
          <input class="form-control mr-sm-2" type="text" placeholder="Search by Institute Name" aria-label="Search" style="width:400px" name="search" required="">
      <button class="btn btn-primary" type="submit">Search</button>
    </form>

      <form>
          <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <button type="button" style="background:transparent;outline: none;border: none;margin-left: 10px"
                 class="nav-link" onclick="myfunction()">
              LogOut
          </button>
          </li>
          </ul>
      </form>
      
  </div>
        </nav>