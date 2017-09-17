<?php
require_once("../../lib/lib_es/util.php");
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
    echo "クッキーを確認しました", "<br>";
    if(isset($_COOKIE["message"])){
      $message = $_COOKIE["message"];
      echo "クッキーの値", es($message), "<hr>";
      echo '<a href = "delete_cookie.php">クッキーを削除するページへ</a>';
    }else{
      echo "クッキーはありません", "<hr>";
      echo '<a href = "set_cookie.php">クッキーを設定するページへ</a>';
    }
   ?>
</div>
</body>
</html>
