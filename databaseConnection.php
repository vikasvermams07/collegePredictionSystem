
<?php
$conn="mysql:host=localhost;dbname=future_institute";
        
        try{
$pdo=new PDO($conn,'root','');

}catch(Exception $e){
echo $e->getMessage();
}

?>