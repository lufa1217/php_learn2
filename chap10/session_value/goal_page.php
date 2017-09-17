
<?php
require_once("../../lib\lib_es\util.php");
session_start();
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>フォームの入力チェック処理(郵便番号)</title>
<link href ="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  確認ページ <br>
  <?php
    if(isset($_SESSION["coupon"])){
      $coupon = $_SESSION["coupon"];
      $couponList = ["ABC123", "XYZ789"];

      if(in_array($coupon, $couponList)){
        echo es($coupon), "は、正しいクーポンコードです。";
      }else{
        echo es($coupon), "は、誤ったクーポンコードです。";
      }
    }else{
      echo "セッションエラーです。";
    }
   ?>
</div>
</body>
</html>
