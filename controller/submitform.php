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
            case 'submitsupport':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 2) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   $stopic=$_POST['arguments'][0];
                   $sfeedback=$_POST['arguments'][1];
				   

				           $email=$_SESSION["emailid"];
                   
                   //connection for Database
                    $con=new DbConnector();

                     $my_query="SELECT uemail from uregistration where uemail=?";
                     $stmt = $con->prepare($my_query); 
                       $stmt->bind_param("s",$email);
                       $stmt->execute();
                       $dbtable="";
                       $result = $stmt->get_result();
                        while($row = $result->fetch_assoc()) {
                          $dbtable=$row['uemail'];
                      }

                      if($dbtable)
                      {
                       $sqlinsert="INSERT INTO `support`(`uemail`, `prob`, `message`) VALUES (?,?,?)";
                       $stmt = $con->prepare($sqlinsert); 
                       $stmt->bind_param("sss", $dbtable,$stopic,$sfeedback);
                      
                       $inserted="";
                       $inserted=$stmt->execute();
                       $stmt->close(); 
                       if($inserted){
                        $aResult['success']="inserted";
                      }else{
                        $aResult['error']="insert failed";
                      }
                        
                      }else{
                        $aResult['error']="not present";
                      }
              
	          }
	    break;

case 'submitfeed':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 4) ) 
               {
                   $aResult['error'] = 'Error in arguments!';
               }
               else 
               {
                   $flag=$_POST['arguments'][0];
                   $prob=$_POST['arguments'][1];
        				   $exp=$_POST['arguments'][2];
        				   $sugg=$_POST['arguments'][3];
				            $email=$_SESSION["emailid"];
                   $feebackID=uniqid("FEED");
                   //connection for Database
                    $con=new DbConnector();

                      $my_query="SELECT uemail from uregistration where uemail=?";
                     $stmt = $con->prepare($my_query); 
                       $stmt->bind_param("s",$email);
                       $stmt->execute();
                       $dbtable="";
                       $result = $stmt->get_result();
                        while($row = $result->fetch_assoc()) {
                          $dbtable=$row['uemail'];
                      }

                      if($dbtable)
                      {
                       $sqlinsert="INSERT INTO `userfeedback`(`uemail`, `feedstar`, `funiid`,`feedanswer`, `feedexep`, `feedsugg`) VALUES (?,?,?,?,?,?)";
                       $stmt = $con->prepare($sqlinsert); 
                       $stmt->bind_param("ssssss", $dbemail,$feedstar,$feebackID,$feedanswer,$feedexep,$feedsugg);
                       $dbemail=$email;
                       $feedstar=$flag;
                       $feedanswer=$prob;
                       $feedexep=$exp;
                       $feedsugg=$sugg;
                      
                       $inserted="";
                       $inserted=$stmt->execute();
                       $stmt->close(); 
                       if($inserted){
                        $aResult['success']="inserted";
                      }else{
                        $aResult['error']="insert failed";
                      }
                        
                      }else{
                        $aResult['error']="not present";
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
