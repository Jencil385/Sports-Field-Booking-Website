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
           
        case 'registeruser':
        if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 5) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
                }else{
               $fname=$_POST['arguments'][0];
               $lname=$_POST['arguments'][1];
               $usrname=$fname." ".$lname;
               $mobile=$_POST['arguments'][2];
               $email=$_POST['arguments'][3];
               $password=$_POST['arguments'][4];
               $password=password_hash($password, PASSWORD_DEFAULT);
               $subscribe=$_POST['arguments'][5];
               $con=new DbConnector();
               $sql = "SELECT * FROM uregistration WHERE uemail=?";
               $stmt = $con->prepare($sql); 
               $stmt->bind_param("s", $email);
               $stmt->execute();
               $dbemail="";
               $result = $stmt->get_result();
                while($row = $result->fetch_assoc()) {
                  $dbemail=$row['uemail'];
              }
                
                  if($dbemail ==""){
                    $sqlinsert="INSERT INTO `uregistration`(`ufname`, `ulname`, `umob`, `uemail`, `upass`, `urole`) VALUES (?,?,?,?,?,?)";
                     $stmt = $con->prepare($sqlinsert); 
                     $dbrole="1";
                     $stmt->bind_param("ssssss",$fname,$lname,$mobile,$email,$password,$dbrole);
                     $stmt->execute();
                     $stmt->close(); 
                      $aResult['success']="inserted";
                  }else{
                    $aResult['error']="already present";
                    $stmt->close(); 
                  }
                }
        break;

        case 'loginuser':
        if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
                }else{
               
               $usrmailid=$_POST['arguments'][0];
               $password=$_POST['arguments'][1];
               
               $con=new DbConnector();
               $sql = "SELECT * FROM uregistration WHERE uemail=?";
               $stmt = $con->prepare($sql); 
               $stmt->bind_param("s", $usrmailid);
               $stmt->execute();
               $dbpass="";
               $dbuser="";
               $result = $stmt->get_result();
                while($row = $result->fetch_assoc()) {
                  $dbpass=$row['upass'];
                  $dbuser=$row['uemail'];
                  $dbrole=$row['urole'];
              }
                
                  if(password_verify($password,$dbpass) && $dbuser==$usrmailid){
                      $aResult['success']="success";
                      $_SESSION['emailid']=$usrmailid;
                      $_SESSION['role']=$dbrole;
                      $aResult['role']=$dbrole;
                       $stmt->close(); 
                  }else{
                    $aResult['error']="Invalid";
                    $stmt->close(); 
                  }
                }
        break;

         case 'logout':
        if( !is_array($_POST['arguments']) || (count($_POST['arguments']) <1) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
                }else{

                  
      session_destroy();
                }
               
        break;
	    default:
	           $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
	           break;
	  }
    
}

    echo json_encode($aResult);
?> 