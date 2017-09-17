<?php
$result = setcookie("message","",time()-1);
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>クッキー削除ページ</title>
<link href ="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
    if($result){
      echo "クッキーを削除しました", "<hr>";
      echo '<a href = "check_cookie.php">クッキーを削除するページへ</a>';
    }else{
      echo '<span class="error">クッキーの削除でエラーがありました。</span>';
    }
   ?>
</div>
</body>
</html>
