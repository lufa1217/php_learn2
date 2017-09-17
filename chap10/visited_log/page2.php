<?php
 require_once("../../lib/lib_es/util.php");

 if(isset($_COOKIE["visitedLog"])){
  $result = "クッキーが設定されています。";

  $visitedLog = $_COOKIE["visitedLog"];

  $visitedCount = $visitedLog["visitedCount"];
  $visitedTime = $visitedLog["visitedTime"];

  $lastTime = date("Y月n月j日Ag時i分", $visitedTime);
  $arrayTest1_implde = $visitedLog["arrayTest1"];
  $arrayTest2_implde = $visitedLog["arrayTest2"];

}else{
  $result = "クッキーが設定されていません。";

　exit($result);
}

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
  $testView1 = explode("&", $arrayTest1_implde);
  $testView1 = es($testView1);

  parse_str($arrayTest2_implde, $testView2);
  $testView2 = es($testView2);

  echo "このページの訪問は。", es($visitedCount), "回目です<br>";
  echo "前回訪問：", es($lastTime), "です<br>";
  echo "テスト１：<br>", implode("<br>",$testView1), "<br>";
  echo "テスト２：<br>";
  foreach ($testView2 as $key => $value) {
    echo "{$key}：{$value}", "<br>";
  }
 ?>
<a href="page1.php"> Page1へ戻る </a>
</div>
</body>
</html>
