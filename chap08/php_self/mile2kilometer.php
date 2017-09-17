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
  if(isset($_POST["mile"])){
    $isNum = is_numeric($_POST["mile"]);
    if($isNum){
      $mile = $_POST["mile"];
      $error = "";
    }else{
      $error = '<span class = "error">←数字を入力してください</span>';
    }

  }else{
    $isNum = false;
    $mile = "";
    $error = "";
  }
 ?>
 
<form method="post" action="<?php echo es($_SERVER['PHP_SELF']) ?>">
  <ul>
    <li>
      <label>
        マイルをKmに変換：<input type="text" name="mile" value="<?php echo $mile?>">
      </label>
      <?php echo $error; ?>
    </li>

    <input type="submit" value="計算する">
  </ul>
</form>
aaa
<?php
  if($isNum){
    echo "<hr>";
    $kilometer = $mile * 1.609344;
    echo "{$mile}マイルは・・・・・{$kilometer}Kmです";
  }

 ?>
</div>
</body>
</html>
