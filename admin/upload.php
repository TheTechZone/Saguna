<?php 
	header('Content-type: application/json; charset=utf-8');
	$uploaded = array();
	echo "fail";
	if( !empty($_FILES['file']['name'][0]) ){
		echo "ok";
	}
?>