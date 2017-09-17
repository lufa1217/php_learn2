<?php

require_once("../../lib/lib_es/util.php");

if(isset($_COOKIE["visitedLog"])){
  $visitedLog = $_COOKIE["visitedLog"];

  $visitedCount = $visitedLog["visitedCount"];
  $visitedTime = $visitedLog["visitedTime"];

  $lastTime = date("Y月n月j日Ag時i分", $visitedTime);

}else{
  echo "テスト";
  $visitedCount = 0;
  $lastTime = "今回が初めての訪問";
}

$arrayTest1 = ["ABC","DEF","GHI"];
$arrayTest1_implde = implode("&",$arrayTest1);

$arrayTest2 = ["A"=>123,"B"=>456,"C"=>789];
$arrayTest2_implde = array_queryString($arrayTest2);

$result1 = setcookie("visitedLog[visitedCount]", ++$visitedCount, time()+(60*5));
$result2 = setcookie("visitedLog[visitedTime]", time(), time()+(60*5));
$result3 = setcookie("visitedLog[arrayTest1]", $arrayTest1_implde, time()+(60*5));
$result4 = setcookie("visitedLog[arrayTest2]", $arrayTest2_implde, time()+(60*5));
$result = ($result1 && $result2 && $result3 && $result4);

?>

<?php
function array_queryString(array $variable){
  $data = [];

  foreach ($variable as $key => $value) {
    $data[] = "{$key}={$value}";
  }

  return implode("&",$data);
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

  $testView1 = explode("&",$arrayTest1_implde);

  if($result){
    echo "このページの訪問は。", es($visitedCount), "回目です<br>";
    echo "前回訪問:", es($lastTime), "です<br>";
    echo '<a href="page2.php"> ページを移動する </a>', "<br>";
    echo '<a href="reset_counter.php"> ページを初期化する </a>';
  }else{
    echo '<span class="error">クッキーが利用できませんでした。</span>', "<br>";
  }
 ?>
</div>
</body>
</html>
