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
require_once("saledata.php");

$couponCode = "nf23qw";
$priceCode = "ax101";

$discount = getCouponList($couponCode);
$tanka = getPriceList($priceCode);

if(is_null($discount) || is_null($tanka)){
  $err = '<div class = "error">不正な操作がありました。 </div>';
  exit($err);
}

$tanka_format = number_format($tanka);
$off = (1 - $discount) * 100;
echo "<h2>このページでのご購入は{$off}%OFFになります！</h2>";


 ?>

<form method="post" action="discount.php">
  <input type="hidden" name="couponCode" value="<?php echo $couponCode; ?>" >
  <input type="hidden" name="priceCode" value="<?php echo $priceCode; ?>" >
  <ul>
    <li><label><?php echo "単価：{$tanka_format}円" ?></label></li>
    <li><label>個数：<input type="number" name="kosu" value="<?php echo $kosu?>"></label></li>
    <input type="submit" value="計算する">
  </ul>
</form>
</div>
</body>
</html>
