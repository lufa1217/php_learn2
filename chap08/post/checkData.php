<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>フォーマットチェック</title>
</head>
 <body>
    <?php
    	echo "<label>";
    	$data = $_GET["data"];

    	$data = rawurldecode($data);

    	$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');

		echo "$data","が渡されたよ～"
	?>
</body>
</html>