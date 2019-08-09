<?php
ini_set ("display_errors", "1"); 
error_reporting(E_ALL); 
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
if(mb_strlen($login) < 5 || mb_strlen($login) > 90){
	echo('Недопустимая длина логина');
	exit();
}
else if(mb_strlen($password) < 2 || mb_strlen($password) > 10){
	echo('Недопустимая длина пароля (от 2 до 10 символов)');
	exit();
}


     $password = md5($password."Ilitrilla");

    $db = new mysqli('127.0.0.1', 'mysql', 'mysql', 'users') or die('Could not connect'); 
	
	$db->query("INSERT INTO `users`(`login`, `password`) VALUES ('$login', '$password')");
	$db->close();
	header('Location: /Итоговое задание PHP/gallery.php');
	exit();