<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset = "utf-8">
<title>フォームの入力チェック処理(郵便番号)</title>
<link href ="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
  <?php
    require_once("../../lib/lib_es/util.php");

    if(!cken($_POST)){
      $encording = mb_internal_encoding();
      $err = "Encoridng Error! The encoding is" .$encording;
      exit($err);
    }

    $_POST = es($_POST);
   ?>

  <?php
    $error =[];
    $isTaste = false;

    if(isset($_POST["taste"])){
      $minValue = 1;
      $maxValue = 5;

      if( ctype_digit($_POST["taste"]) && ($minValue <= (int)$_POST["taste"]) && ($maxValue >= (int)$_POST["taste"]) ) {
        $isTaste = true;
        $tasteValue = $_POST["taste"];

      }else{
        $tasteValue = "error";
        $error[]= "「甘味」に入力エラーがありました。";
      }
    }else{
      $tasteValue = round(($minValue + $maxValue)/2);
    }
  ?>

<form method="post", action=<?php echo es("$_SERVER[PHP_SELF]"); ?>
  <ul>
    <li><span>甘味：</span>
      <input name="taste" type="range" value=<?php echo $tasteValue ?> min="1" max="5" step="1">
    </i>
    <li><input type="submit" value="送信する"></li>
  </ul>
</form>

<?php
  if($isTaste ){
    $tasteList = ["甘い","少し甘い","普通","少し苦い","苦い"];
    echo "<hr>";
    echo "甘味は、{$tasteValue}.{$tasteList[$tasteValue-1]}です";
  }

  if(count($error) > 0){
    echo '<span = ”error”>' , implode("<br>", "$error"), '</span>';
  }
 ?>
</div>
</body>
</html>
