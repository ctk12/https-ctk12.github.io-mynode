<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(0);
//$header = apache_request_headers();
//$linkid = $header['linkid'];

//  ["dbtn","lrbtn","llbtn","ibtn","Uppercase Letters - English"]

function db(){
	static $conn;                
	if($conn == NULL){
	 $conn = mysqli_connect("localhost","admin_site","8Uw7rd#33","admin_katwa_opticals"); 
	}
	if(!$conn){
		die("Could not connect to database");
	}
	return $conn;  
}

function sanitize($data)
{$conn = db();return mysqli_real_escape_string($conn,$data);}

function array_sanitize(&$item)
{$conn = db();return mysqli_real_escape_string($conn,$item);}

function u_data($arr){
$cols = "";$conn = db();array_walk($arr,'array_sanitize');
foreach($arr as $key=>$val){$cols .= "$key = '$val',";}
$cols = substr_replace($cols ,"",-1);
$sql = "UPDATE remote SET ". $cols ." WHERE id='1'";
if(mysqli_query($conn, $sql)){ return true; } else { echo $conn->error; return false; }}

  
 function f_onedata(){
 $conn = db();
	$query = mysqli_query($conn,"Select * from remote where id='1'");
	if(mysqli_num_rows($query) > 0){ return mysqli_fetch_assoc($query); }
	else { return 0; }}


    function getData() {
        $dd = f_onedata();
		return $dd['dbtn'];
    }

		 echo getData();
		
	
    

// id
// dbtn
// lrbtn
// llbtn
// ibtn
// dropdown



       
       
       
       
       


?>
