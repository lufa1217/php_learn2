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

  if(isset($_POST["zip"])){
      $zip = trim($_POST["zip"]);
      $format = "/^[0-9]{3}-[0-9]{4}$/";
      if(!preg_match($format, $zip)){
        $errors[] = "郵便番号を正しく入力してください";
      }
  }else{
    $errors[] = "郵便番号が未設定です";
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
      echo "郵便番号は{$zip}です。";
  }
 ?>

 <form method="post" action="zipCheckForm.php">
   <ul>
     <li><input type="submit" value="戻る"></li>
   </ul>
 </form>


</body>
</html>
