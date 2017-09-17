<?php
require_once("../../lib/lib_es/util.php");
session_start();

if(isset($_POST["name"])){
  $_SESSION["name"] = $_POST["name"];
}

if(isset($_POST["kotoba"])){
  $_SESSION["kotoba"] = $_POST["kotoba"];
}

if(empty($_SESSION["dogcat"])){
  $dogcat = [];
}else{
  $dogcat = $_SESSION["dogcat"];
}

 ?>

 <?php

function checked( $value , $question){

  $isChecked = false;

  if (is_array($question)) {
    if(in_array($value, $question)){
      $isChecked = true;
    }
  }else{
    $isChecked = $value === $question;
  }

  if($isChecked){
    echo "checked";
  }else{
    echo "";
  }
}

  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>犬好き猫好きページ</title>
<link href ="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  アンケート（２／２）<br>
  <form action="confirm.php" method="post">
    <ul>
      <li><span>犬が好きですか？　猫が好きですか？</li>
      <li><label><input type="checkbox" name="dogcat[]" value="犬" <?php checked("犬", $dogcat); ?>> 犬が好き</label> </li>
      <li><label><input type="checkbox" name="dogcat[]" value="猫" <?php checked("猫", $dogcat); ?>> 猫が好き</label> </li>

      <input type="button" value="戻る" onclick="location.href='input.php'">
      <input type="submit" value="確認する">
    </ul>
  </form>
</div>
</body>
</html>
