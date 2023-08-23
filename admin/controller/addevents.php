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

    if( !isset($aResult['error'])) 
    {

        switch($_POST['functionname']) 
        {
           
        case 'addevents':
         if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                $con=new DbConnector();

                 $information=$_POST['arguments'][0];
                 $email=$information[0];
                 $eventTitle=$information[1];
                 $eventDesc=$information[2];
                 $datetimes=$information[3];
                 $eventName=$information[4];
                 $eventunqid=uniqid("EVE");

                  $sql = "INSERT INTO `uevents`(`eventuniid`, `eventTitle`, `eventDesc`, `eventDate`,`uemail`) VALUES (?,?,?,?,?)";
                  $stmt = $con->prepare($sql); 
                  $stmt->bind_param("sssss", $eventunqid,$eventTitle,$eventDesc,$datetimes,$email);
                  if($stmt->execute())
                  {
                    $aResult['success']="inserted";
                    $stmt->close(); 
                  }else{
                    $aResult['error']="insert failed";
                    $stmt->close(); 
                  }

               }
        break;


        case 'deleteevents':
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
                  $sql = "DELETE FROM `eventregdetails` WHERE eventuniid=?";
                  $stmt = $con->prepare($sql); 
                  $stmt->bind_param("s", $bid);
                 


                  $sqls = "DELETE FROM `uevents` WHERE eventuniid=?";
                  $stmts = $con->prepare($sqls); 
                  $stmts->bind_param("s", $bid);



                  if($stmt->execute() && $stmts->execute()){
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


        case 'deletglodeevents':
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
                  $sql = "DELETE FROM `ufeedback` WHERE ufeeuniid=?";
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
       

       case 'deletefeedbacks':
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
                  $sql = "DELETE FROM `userfeedback` WHERE funiid=?";
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