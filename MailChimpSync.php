<?php

Include /Include/Config.php

//mysql_connect('localhost', '<sql user>', '<sql PW>') or die( mysql_error() );
//mysql_select_db('<your DB>');

$sql = "SELECT per_Email, per_FirstName, per_LastName FROM person_per WHERE per_friendDate > DATE_SUB(NOW(), INTERVAL 1 DAY)";

$result = mysql_query($sql) or die(mysql_error());


$array = array();

while($row = mysql_fetch_assoc($result)) {
   $array[] = $row;
}
}

// print your array for debug
//print_r(array_values($array));
//



/**
This Example shows how to run a Batch Subscribe on a List using the MCAPI.php 
class and do some basic error checking or handle the return values.
**/


require_once 'inc/MCAPI.class.php';

$apikey = <your api key>
$api = new MCAPI($apikey);


//Christian Life Newsletter list
$listId = "<list Id is available from mail chimp, this is for one specific list in your account>";





foreach($array as $key => $value) {
    $batch[] = array('EMAIL'=>$value['per_Email'], 'FNAME'=>$value['per_FirstName'], 'LNAME'=>$value['per_LastName']);
}






 
//$batch[] = array('EMAIL'=>$row[0], 'FNAME'=>$row[1], 'LNAME'=>$row[2]);
//$batch[] = array('EMAIL'=>'boss2.man@email.org', 'FNAME'=>'Me2', 'LNAME'=>'Chimp2');
 
$optin = False; //yes, send optin emails
$up_exist = true; // yes, update currently subscribed users
$replace_int = false; // no, add interest, don't replace
 
$vals = $api->listBatchSubscribe($listId,$batch,$optin, $up_exist, $replace_int);
 
if ($api->errorCode){
    echo "Batch Subscribe failed!\n";
	echo "code:".$api->errorCode."\n";
	echo "msg :".$api->errorMessage."\n";
} else {
	echo "added:   ".$vals['add_count']."\n";
	echo "updated: ".$vals['update_count']."\n";
	echo "errors:  ".$vals['error_count']."\n";
	foreach($vals['errors'] as $val){
		echo $val['email_address']. " failed\n";
		echo "code:".$val['code']."\n";
		echo "msg :".$val['message']."\n";
	}}
	
	
	

?> 
