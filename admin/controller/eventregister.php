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
           
        case 'registerevent':
        if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 5) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
                }else{
               $eventTeamName=$_POST['arguments'][0];
               $eventCapName=$_POST['arguments'][1];
               $eventEmail=$_POST['arguments'][2];
               $eventMob=$_POST['arguments'][3];
               $eventID=$_POST['arguments'][4];
               $con=new DbConnector();
               $sql = "SELECT * FROM eventregdetails WHERE evnEmail=? and eventID=?";
               $stmt = $con->prepare($sql); 
               $stmt->bind_param("ss", $eventEmail,$eventID);
               $stmt->execute();
               $dbemail="";
               $result = $stmt->get_result();
                while($row = $result->fetch_assoc()) {
                  $dbemail=$row['evnEmail'];
              }
                
                  if($dbemail ==""){
                    $sqlinsert="INSERT INTO `eventregdetails`(`eventID`, `evnTeamname`, `evnCapname`, `evnMob`, `evnEmail`) VALUES (?,?,?,?,?)";
                     $stmt = $con->prepare($sqlinsert); 
                     $dbrole="1";
                     $stmt->bind_param("sssss",$eventID,$eventTeamName,$eventCapName,$eventMob,$eventEmail);
                     $stmt->execute();
                     $stmt->close(); 
                      $aResult['success']="inserted";
                  }else{
                    $aResult['error']="already present";
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