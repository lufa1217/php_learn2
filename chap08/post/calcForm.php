<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>フォームの入力処理(POST)</title>
<link href ="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<form method="post" action="calc.php">
	<ul>
		<li><label>単価：<input type="number" name="tanka" ></label></li>
		<li><label>個数：<input type="number" name="kosu"  ></label></li>
		<li><input type="submit" value="計算する"></li>
	</ul>
</form>

<form method="get" action="checkNo.php">
	<ul>
		<li><label>番号チェック</label></li>
		<li><label>番号：<input type="number" name="no" ></label></li>
		<li><input type="submit" value="チェックする"></li>
	</ul>
</form>

<ul>
<?php
	$data = "東京<br>";
	$data = rawurlencode($data);

	$url = "checkData.php";
	echo "<a href={$url}?data=${data} >", "送信する","</a>";
?>
</ul>

</div>
</body>
</html>
