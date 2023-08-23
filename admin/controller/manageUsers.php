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
           
        case 'deleteusers':
        if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
                }else{
               $information=$_POST['arguments'][0];
               $emailid=$information[0];
               
               $con=new DbConnector();
                $sqlinsert="DELETE FROM `uregistration` where uemail=?";
                     $stmt = $con->prepare($sqlinsert); 
                     
                     $stmt->bind_param("s",$emailid);
                    if( $stmt->execute()){
                       $stmt->close(); 
                      $aResult['success']="inserted";
                    }else{
                      $aResult['error']="failed";
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