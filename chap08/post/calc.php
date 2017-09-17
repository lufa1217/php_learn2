<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>フォーム入力の値で計算する</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
	$tanka = $_POST["tanka"];
	$kosu  = $_POST["kosu"];

	$price = $tanka * $kosu;

	$tanka = number_format($tanka);
	$price  = number_format($price);

	echo "{$tanka}円 × {$kosu} = {$price}";
?>


</div>
</body>
</html>