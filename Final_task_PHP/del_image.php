<?php
	ini_set ("display_errors", "1"); 
	error_reporting(E_ALL); 
	$db = new mysqli('127.0.0.1', 'mysql', 'mysql', 'users') or die('Could not connect'); 
	if(isset($_POST['delete'])){
		$img = $_POST['id'];
		$db->query("DELETE FROM `images` WHERE `id_image` = $img");
	}
	$db->close();
	header('Location: /Итоговое задание PHP/user.php');
	   
 #print_r ($_POST['id']); 