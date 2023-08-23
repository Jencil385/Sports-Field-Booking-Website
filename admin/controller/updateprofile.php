<?php 
session_start();
require_once('../../database/database.php');


 $aResult = array();
 
  if( !isset($_POST['functionname']) ) 
  	{ 
  		$aResult['error'] = 'No function name!';
  	}

    if( !isset($_POST['arguments']) )
    { 
    	$aResult['error'] = 'No function arguments!'; 
    }

    if( !isset($aResult['error']) ) 
    {

        switch($_POST['functionname']) 
        {
           
        case 'updateprofile':
         if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                $con=new DbConnector();

                 $information=$_POST['arguments'][0];
                 $fname=$information[0];
                 $lname=$information[1];
                 $uphone=$information[2];
                 $umail=$information[3];

                  $sql = "UPDATE uregistration SET ufname=?,ulname=?,umob=? WHERE uemail=?";
                  $stmt = $con->prepare($sql); 
                  $stmt->bind_param("ssss", $fname,$lname,$uphone,$umail);
                  $stmt->execute();
                  $stmt->close(); 
                 echo $fname;
                 error_log(print_r($fname,true));

               }
        break;
        

        case 'changepass':
         if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                $con=new DbConnector();

                 $information=$_POST['arguments'][0];
                 $oldpass=$information[0];
                 $newpass=$information[1];
                 $conpass=$information[2];
                 $umail=$information[3];

                 $sql = "SELECT * FROM uregistration WHERE uemail=?";
               $stmt = $con->prepare($sql); 
               $stmt->bind_param("s", $umail);
               $stmt->execute();
               $dbpass="";
               $dbuser="";
               $result = $stmt->get_result();
                while($row = $result->fetch_assoc()) {
                  $dbpass=$row['upass'];
                  $dbuser=$row['uemail'];
              }


                 if(password_verify($oldpass,$dbpass) && $dbuser==$umail){
                    $newpass=password_hash($newpass, PASSWORD_DEFAULT);
                  $sql = "UPDATE uregistration SET upass=? WHERE uemail=?";
                  $stmt = $con->prepare($sql); 
                  $stmt->bind_param("ss", $newpass,$umail);
                  $stmt->execute();
                  $stmt->close();
                  $aResult['success']="updated";

                  }else{
                    $aResult['error']="Invalid";
                    $stmt->close(); 
                  } 

               }
        break;

    case 'deactivate':
         if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                $con=new DbConnector();

                 $information=$_POST['arguments'][0];
                
                 $umail=$information[0];

                 $sql = "SELECT * FROM uregistration WHERE uemail=?";
               $stmt = $con->prepare($sql); 
               $stmt->bind_param("s", $umail);
               $stmt->execute();
              
                 if($result = $stmt->get_result()){
                  $sql = "DELETE FROM uregistration WHERE uemail=?";
                  $stmt = $con->prepare($sql); 
                  $stmt->bind_param("s",$umail);
                  $stmt->execute();
                  $stmt->close();
                  $aResult['success']="updated";
                  session_destroy();
                  }else{
                    $aResult['error']="Invalid";
                    $stmt->close(); 
                  } 

               }
        break;

        case 'addbookings':
         if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                $con=new DbConnector();

                 $information=$_POST['arguments'][0];
                
                 $email=$information[0];
                 $event=$information[1];
                 $eventtype=$information[2];
                 $datetime=$information[3];
                 $duhr=$information[4];
                 $dumin=$information[5];
                 $due=$duhr." ".$dumin;
                 $bid=uniqid("BOOK");
                   $sql = "SELECT * FROM uregistration WHERE uemail=?";
                   $stmt = $con->prepare($sql); 
                   $stmt->bind_param("s", $email);
                   $stmt->execute();
         
                $parts = array_map(function($num) {
                        return (int) $num;
                    }, explode(' ', '01 hrs 01 mins'));

                    $timeA = new DateTime($datetime);
                    $timeB = new DateInterval(sprintf('PT%uH%uM%uS', $parts[0], $parts[2], 0));
                    $timeA->add($timeB);
                    $endtime= $timeA->format('Y-m-d H:i:s');


                 if($result = $stmt->get_result()){
                  $sql = "INSERT INTO `ubookings` (`bID`, `eventField`, `bevent`, `bdate`, `edate`,`uemail`,`bduration`) VALUES (?,?,?,?,?,?,?)";
                  $stmt = $con->prepare($sql); 
                  $stmt->bind_param("sssssss", $bid,$eventtype,$event,$datetime,$endtime,$email,$due);
                  $stmt->execute();
                  $stmt->close();
                  $aResult['success']="updated";

                  }else{
                    $aResult['error']="Invalid";
                    $stmt->close(); 
                  } 

               }
        break;


        case 'deletebookings':
         if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                $con=new DbConnector();

                 $information=$_POST['arguments'][0];
                
                 $email=$information[0];
                 $bid=$information[1];
            
                   $sql = "SELECT * FROM uregistration WHERE uemail=?";
                   $stmt = $con->prepare($sql); 
                   $stmt->bind_param("s", $email);
                   $stmt->execute();
         
               


                 if($result = $stmt->get_result()){
                  $sql = "DELETE FROM `ubookings` WHERE bID=? AND uemail=?";
                  $stmt = $con->prepare($sql); 
                  $stmt->bind_param("ss", $bid,$email);
                 
                  if($stmt->execute()){
                  $aResult['success']="updated";
                   $stmt->close();
                    }else{
                        $aResult['error']="Invalid";
                         $stmt->close();
                    }
                  }else{
                    $aResult['error']="Invalid";
                    $stmt->close(); 
                  } 

               }
        break;


        case 'deleteadminbookings':
         if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                $con=new DbConnector();

                 $information=$_POST['arguments'][0];
                
                 $email=$information[0];
                 $bid=$information[1];
            
                   $sql = "SELECT * FROM uregistration WHERE uemail=?";
                   $stmt = $con->prepare($sql); 
                   $stmt->bind_param("s", $email);
                   $stmt->execute();
         
               


                 if($result = $stmt->get_result()){
                  $sql = "DELETE FROM `ubookings` WHERE bID=?";
                  $stmt = $con->prepare($sql); 
                  $stmt->bind_param("s", $bid);
                 
                  if($stmt->execute()){
                  $aResult['success']="updated";
                   $stmt->close();
                    }else{
                        $aResult['error']="Invalid";
                         $stmt->close();
                    }
                  }else{
                    $aResult['error']="Invalid";
                    $stmt->close(); 
                  } 

               }
        break;

	    default:
	           $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
	           break;
	  }
    
}

    echo json_encode($aResult);
?> 