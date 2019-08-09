<?php
ini_set ("display_errors", "1"); 
error_reporting(E_ALL); 
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

     $password = md5($password."Ilitrilla");

    $mysql = new mysqli('127.0.0.1', 'mysql', 'mysql', 'users') or die('Could not connect'); 

	$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
	$user = $result->fetch_assoc();
	if(count($user) == 0){
		header('Location: /Итоговое задание PHP/gallery.php');
	}
	setcookie('user', $user['login'], time() + 3600*24, "/");
	
	$result->close();
	header('Location: /Итоговое задание PHP/gallery.php');
	exit();