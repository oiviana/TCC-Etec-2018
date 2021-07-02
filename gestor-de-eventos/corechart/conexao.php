<?php


   $db['server'] = 'localhost';
   $db['user']    = 'root';
   $db['password'] = '';
   $db['dbname'] = 'bd_reinvisit';

	$conn = mysqli_connect( $db['server'] ,$db['user'] ,$db['password']);

	mysqli_select_db($conn, $db['dbname']);

?>
