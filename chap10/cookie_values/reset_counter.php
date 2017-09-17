<?php
  $result = setcookie("visitedCount", 0, time()+(60*5));
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>Page1</title>
<link href ="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
  if($result){
    echo "カウンタをリセットしました。<hr>";
    echo '<a href="page1.php"> Page1へ戻る </a>', "<br>";
  }else{
    echo '<span class="error">カウンタのリセットに失敗しました。。</span>', "<br>";
  }
 ?>
</div>
</body>
</html>
