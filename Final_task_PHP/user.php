<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content=""/>
<meta name="keywords" content="" />
<meta name="author" content="" />

<link rel="stylesheet" type="text/css" href="reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<!--[if lte IE 7]><link rel="stylesheet" type="text/css" href="ie_fixes.css" media="screen" /><![endif]-->

<title>Website Template: Gallery</title>

<script type="text/javascript" src="./scripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="./scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="style.css" />

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
				<form action=load_user.php method="post" enctype="multipart/form-data">
			<input type="file" name="upload[]" multiple>
			<input type="submit" name="button" value="Загрузить">
			</form>
			<a href="user.php">
	<?php endif;?>
			<div class="post_top">
			
			

			</div>
				
			<div>
			
			</div>

			<?php
$db = new mysqli('127.0.0.1', 'mysql', 'mysql', 'users') or die('Could not connect'); 
	
	$query = $db->query("SELECT * FROM images ORDER BY id_image DESC");
	while($row = $query->fetch_assoc()){
		$show_img = base64_encode($row['image']);
		$show_id = $row['id_image'];
		$show_count = $row['counter'];?>
		<a href="image.php?id=<? echo $show_id; ?>"><img src="data:image/jpeg;base64,  <?=$show_img ?>"width="550" height="500" alt="" ></a><br>
	<br><div>Количество просмотров: <?php echo ($show_count) ?></div>
	<?php 
	
	
	} ?>

		</div>

	</div>
</div>
</div>
</div>
</div>

</body>
</html>