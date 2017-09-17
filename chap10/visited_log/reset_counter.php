<?php
  $result1 = setcookie('visitedLog[visitedCount]', "", time()-10000);
  $result2 = setcookie('visitedLog[visitedTime]', "", time()-10000);

  $result = ($result1 && $result2);
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>リセットページ</title>
<link href ="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
  if($result){
    echo "訪問ログをリセットしました。<hr>";
    echo '<a href="page1.php"> Page1へ戻る </a>', "<br>";
  }else{
    echo '<span class="error">カウンタのリセットに失敗しました。。</span>', "<br>";
  }
 ?>
</div>
</body>
</html>
