<!DOCTYPE html>
<html>

<head>
	<title>Titulo</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<script type="text/javascript" src="/newz/public/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="/newz/public/js/custom.js"></script>
</head>

<body>

<a href="<?=URL?>">Home</a>
<a href="<?=URL?>home/all">Tudo</a>
<a href="<?=URL?>browse">Navegar</a>
<br />

<?php

// Session::init();

if (isset($_SESSION['loggedIn']) == true) {
	$logged = true;
	$user = Session::get('userName');
} else {
	$logged = false;
	$user = 'guest';
}

?>

<?=$user?>

<?php if ($logged == true): ?>
	<a href="<?=URL?>account">Conta</a>
	<a href="<?=URL?>home/logout">logout</a>
	IP: <?=$_SERVER['REMOTE_ADDR']?><br />

	<a href="<?=URL?>newstory">New Story</a>
<?php else: ?>
	<a href="<?=URL?>login">login</a>
<?php endif;?>