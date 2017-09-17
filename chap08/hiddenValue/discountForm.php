<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>フォームの入力処理(隠し)</title>
<link href ="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>

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
  if(isset($_POST["kosu"])){
    $kosu = $_POST["kosu"];
  }else{
    $kosu = "";
  }
 ?>

<?php
$discount = 0.8;
$off = (1 - $discount) * 100;

echo "<h2>このページでのご購入は{$off}%OFFになります！</h2>";
$tanka = 2900;
$tanka_format = number_format(2900);
 ?>

<form method="post" action="discount.php">
  <input type="hidden" name="discount" value="<?php echo $discount; ?>" >
  <input type="hidden" name="tanka" value="<?php echo $tanka; ?>" >
  <ul>
    <li><label><?php echo "単価：{$tanka_format}円" ?></label></li>
    <li><label>個数：<input type="number" name="kosu" value="<?php echo $kosu?>"></label></li>
    <input type="submit" value="計算する">
  </ul>
</form>
</div>
</body>
</html>
