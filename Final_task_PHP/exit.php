<?php
setcookie('user', $user['login'], time() - 3600*24, "/");
header('Location: /Итоговое задание PHP/gallery.php');