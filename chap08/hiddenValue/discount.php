<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>フォームの入力チェック処理(郵便番号)</title>
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

  if(isset($_POST["discount"])){
      $discount = $_POST["discount"];
      if(!is_numeric($discount)){
        $errors[] = "割引率の数値エラー";
      }
  }else{
    $errors[] = "割引率が未設定です";
  }

  if(isset($_POST["tanka"])){
      $tanka = $_POST["tanka"];
      if(!is_numeric($tanka)){
        $errors[] = "単価の数値エラー";
      }
  }else{
    $errors[] = "単価が未設定です";
  }

  if(isset($_POST["kosu"])){
      $kosu = $_POST["kosu"];
      if(!is_numeric($kosu)){
        $errors[] = "個数は正の数値で入力してください。";
      }
  }else{
    $errors[] = "個数が未設定です";
  }
 ?>

<?php

  if(count($errors) > 0){
    echo '<ol class="error">';

    foreach ($errors as $value) {
      echo "<li>{$value}</li>";
    }
    echo "</ol>";

  }else{
    $price = $tanka * $kosu;
    $discount_price = floor($price * $discount);
    $off_price = $price - $discount_price;
    $off_per   = (1-$discount) * 100;

    echo "単価：{$tanka}、個数{$kosu}" ,"<br>";
    echo "金額：{$discount_price}円" ,"<br>";
    echo "(割引：{$off_price}円、{$off_per}%OFF)" ,"<br>";
  }
 ?>

 <form method="post" action="discountForm.php">
   <input type="hidden" name="kosu" value="<?php echo $kosu; ?>" >
   <ul>
     <li><input type="submit" value="戻る"></li>
   </ul>
 </form>


</body>
</html>
