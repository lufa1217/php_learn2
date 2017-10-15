<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>フォームの入力チェック処理(数値)</title>
<link href ="../../css/style.css" rel="stylesheet">
</head>
<body>
<?php
  require_once("lib_es/util.php");

  if(!cken($_POST)){
    $encording = mb_internal_encoding();
    $err = "Encording Error: The expected endording is {$endording}";
    exit($err);
  }

 $_POST = es($_POST);
?>

<?php
  $errors = [];

  if(isset($_POST["goukei"])){
      $goukei = trim($_POST["goukei"]);
      if(!ctype_digit($goukei)){
        $errors = "合計金額を整数で入力してください";
      }
  }else{
    $errors = "合計金額が未設定です";
  }

  if(isset($_POST["ninzu"])){
      $ninzu = trim($_POST["ninzu"]);
      if(!ctype_digit($ninzu)){
        $errors = "人数を整数で入力してください";
      }else if($ninzu == 0){
        $errors = "0人では割れません。";
      }
  }else{
    $errors = "人数が未設定です";
  }
 ?>

<?php
  if(count($errors) > 0){
    echo "<ol class="error">";

    foreach ($errors as $value) {
      echo "<li>{$value}</li>"
    }

    echo "</ol>";
 ?>

<form method="post" action="warikanForm.php">
  <ul>
    <li><input type="submit" value="戻る"></li>
  </ul>
</form>

<?php

}else{
  $amari = $goukei % $ninzu;
  $price = ($goukei - $amari) / $ninzu;

  $price_format = number_format($price);
  $goukei_format = number_format($goukei);

  echo "{$goukei_format}を{$ninzu}人で割り勘します。", "<br>";
  echo "一人当たり{$price_format}円を払えば、不足分は{$amari}円です。";
}

 ?>

</body>
</html>
