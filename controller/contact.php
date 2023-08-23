<?php
require_once("../database/database.php");
    if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['message'])){
        
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject = $_POST['subject'];
    $message=$_POST['message'];
    $eventunqid=uniqid("GEVE");
         $con=new DbConnector();
         $sqlinsert="INSERT INTO `ufeedback`(`feedusrname`, `ufeeuniid`,`feedusremail`, `feedusrsub`, `feedusrmess`) VALUES (?,?,?,?,?)";
                     $stmt = $con->prepare($sqlinsert); 
                     $stmt->bind_param("sssss",$name,$eventunqid,$email,$subject,$message);
                     if($stmt->execute()){
                     $stmt->close(); 
                       echo "Your message has been sent. Thank you!";
                      }else{
                        echo "error";
                      }
    
    
}
?>
