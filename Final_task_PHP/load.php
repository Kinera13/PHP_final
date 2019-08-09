<?php
	ini_set ("display_errors", "1"); 
error_reporting(E_ALL); 

$db = new mysqli('127.0.0.1', 'mysql', 'mysql', 'users') or die('Could not connect'); 
	if (isset($_POST['upload'])){
		
		if (!empty($_FILES['upload']['tmp_name'][$i])) 
			$image_name =($_FILES['upload']['name'][$i]);
	}
	for($i=0; $i<count($_FILES['upload']['name']); $i++){
			$image_name =($_FILES['upload']['name'][$i]);	
		$upload_path = ($_FILES["upload"]["tmp_name"][$i]);
		$login = $_COOKIE['user'];
		
		$image = addslashes(file_get_contents($_FILES['upload']['tmp_name'][$i]));
		$db->query("INSERT INTO `images`(`image`, `image_name`, `image_path` ,`login`, `counter`) VALUES ('$image', '$image_name', '$upload_path' ,'$login', 0)");
	}
		$db->close();
		header('Location: /Итоговое задание PHP/gallery.php');