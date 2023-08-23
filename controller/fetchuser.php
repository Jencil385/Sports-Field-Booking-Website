<?php 
session_start();
require_once('../database/database.php');


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
           
        case 'fetchuser':
         if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
                }
               else
               {
                  $aResult['success']="";
                  $con=new DbConnector();
                  $user=$_POST['arguments'][0];
                  $sql = "SELECT * FROM uregistration WHERE uemail=?";
                  $stmt = $con->prepare($sql); 
                  $stmt->bind_param("s", $user);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  while ($row = $result->fetch_assoc()) {
                      $aResult['success']=$row['urole'];
                  }  $stmt->close(); 
                     if($aResult['success']==""){
                      $aResult['error'] = 'ID not found';
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