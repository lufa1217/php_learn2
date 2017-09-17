<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>フォーマットチェック</title>
</head>
 <body>
    <?php
    	echo "<label>";
    	$no = $_GET["no"];

		$checks = [1,3,5,6];

		$result = "見つかりません。。。";

		foreach ($checks as $check){
			if($check == $no){
				$result = "見つかりました！";
				break;
			}
		}

		echo $result;
		echo "</label>";
	?>
</body>
</html>