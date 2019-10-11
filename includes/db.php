<?php

$db_info = array("host"=>'localhost',"user"=>'root',"pass"=>'',"name"=>'g');
foreach($db_info as $key => $value){
	define(strtoupper($key),$value);
}
$connection = mysqli_connect(HOST,USER,PASS,NAME);
if(!$connection){
	echo "We`re not Connected!";
}

?>