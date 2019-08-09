<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content=""/>
<meta name="keywords" content="" />
<meta name="author" content="" />

<link rel="stylesheet" type="text/css" href="reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>

<body>

<div id="paper_left">
<div id="paper_right">
<div id="layout_wrapper">
<div id="layout_container">
<div id="layout_content">
	<div id="main">
		
		<div class="post">
		<div class = "container mt-4">
		<?php
			if ($_COOKIE['user'] == ''):
		?>
			Регистрация: <form action='index.php' method='POST'>
		<input name='login'> логин
		<input name='password'> пароль
		<input type='submit' value='Отправить'>
	</form>
	Авторизация: <form action='index2.php' method='POST'>
		<input name='login'> логин
		<input name='password'> пароль
		<input type='submit' value='Отправить'>
	</form>
	</div>
	<?php else:?>
	<h2><p>Приветствую, <?=$_COOKIE['user']?><br><h6><a href="exit.php">Выйти</a></h6></p></h2>
	<a href="gallery.php">На главную<a>	
				
			<a href="user.php">
	<?php endif;?>
			<div class="post_top">
			
			

			</div>
				
			<div class="image image-flex">
			<?php
			$db = new mysqli('127.0.0.1', 'mysql', 'mysql', 'users') or die('Could not connect'); 
			$name=$_GET['id'];
			
			$query = $db->query("SELECT `image`, `counter`  FROM `images` WHERE `id_image`=$name");
			$result = mysqli_fetch_assoc($query);
			$img = base64_encode($result['image']);?>
			<img src="data:image/jpeg;base64,  <?=$img ?>"width="600" height="500" alt="">
			<style text/css>
			.image-flex{
	display: flex;
	align-items: center;
	justify-content: center;
}
			<style>
			<?php 
		
			$query2 = $db->query("UPDATE `images` SET `counter`=`counter`+1 WHERE `id_image`='$name'");
			$db->close();
			?>
			</div>
			</div>
</div>
</div>
</div>
</div>

</body>
</html>