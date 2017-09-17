<?php
require_once("../../lib/lib_es/util.php");
session_start();
 ?>

<?php
if (!cken($_POST)) {
  $encording = mb_internal_encoding();
  $err = "Encording Error Ther expected encording is {$encording}";
  exit($err);
}
 ?>

<?php

$error = [];

if(empty($_SESSION["name"])){
  $error[] = "名前を入力してください。";
}else{
  $name = $_SESSION["name"];
}

if(empty($_SESSION["kotoba"])){
  $error[] = "好きな言葉を入力してください。";
}else{
  $kotoba = $_SESSION["kotoba"];
}

if(isset($_POST['dogcat'])){
  $_SESSION["dogcat"] = $_POST["dogcat"];
  $dogcat = $_POST["dogcat"];

  $diffValue = array_diff($dogcat, ["犬","猫"]);

  if(count($diffValue) > 0){
    $error = "犬好き猫好き回答にエラーがありました";
  }

  $dogcatString = implode("好きで", $dogcat)."好きです";
}else{
  $_SESSION["dogcat"] = [];
  $dogcatString = "どちらも好きではない";
}

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
  <form>
    <?php if(count($error) > 0 ) { ?>
      <span class="error"> <?php echo implode("<br>", $error); ?> </span><br>
      <span><input type="button" value="戻る" onclick="location.href='input.html'"></span>
    <?php } else { ?>
      <span>
        名前：<?php echo es($name); ?><br>
        好きな言葉：<?php echo es($kotoba); ?><br>
        犬猫好き：<?php echo $dogcatString ?><br>
        <input type="button" value="戻る" onclick="location.href='input.php'">
        <input type="button" value="送信する" onclick="location.href='thankyou.php'">
      </span>
    <?php } ?>
  </form>
</div>
</body>
</html>
