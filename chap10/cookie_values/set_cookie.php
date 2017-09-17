<?php

$message = "ハロー";

$result = setcookie("message", $message);

 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>確認ページ</title>
<link href ="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
  if($result){
    echo "クッキーを保存しました。", "<br>";
    echo '<a href="check_cookie.php"> クッキーを確認するページへ </a>';
  }else{
    echo '<span class="error">クッキーの保存でらーがありました。</span>', "<br>";
  }
 ?>
</div>
</body>
</html>
