<?php
set_time_limit(0);
class functions{

public function __construct(){

//echo "<pre>";
/*TNS infor f oracle connection*/
/*$dbstr="(DESCRIPTION=
                (ADDRESS=(PROTOCOL=tcp)(HOST=86.51.177.84)(PORT=1530))
            (CONNECT_DATA=
                (SERVICE_NAME=TEST)
                (INSTANCE_NAME=TEST)
            )
        )";*/
		
		$dbstr="(DESCRIPTION=
                (ADDRESS=(PROTOCOL=tcp)(HOST=appsrv.sendan.com.sa)(PORT=1530))
            (CONNECT_DATA=
                (SERVICE_NAME=TEST)
                (INSTANCE_NAME=TEST)
            )
        )";
		
		
		
/*end*/
/*oci connection oci_connect("userid", "password", $dbstr*/
//$conn = oci_connect("apps", "testadm1n", $dbstr);
$this->dbo = oci_connect("apps", "testadm1n", $dbstr);


	
	}
	
function login($user_name,$password)
	{
			
			 $view=oci_parse($this->dbo,"Select* from users where USER_NAME='".$user_name."' AND PASSWORD='".$password."' AND USER_STATUS=1");
			 $result= oci_execute($view);
			if($result)
			{

			  $num =oci_fetch_array($view, OCI_ASSOC+OCI_RETURN_NULLS);
			  if($num['USER_ID'] !='')
			  {
			  $_SESSION['username_admin'] = $user_name;

			 //header('location:index.php');
			  return 1;
			  }
			  else
			  {
				//  echo '<script>alert("Username or Password is Incorrect");</script>';
				  return 0;
			  }
			  
			}
			else
			{
				return 0;
		}
		
		
	}
}	
	?>