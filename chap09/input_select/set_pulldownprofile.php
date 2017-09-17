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
    $encording = mb_internal_encoding();

    if(!cken($_POST)){
      $err = "Encording Error! The expected encording is" .$encording;
      exit($err);

    }

    $_POST = es($_POST);
   ?>

 <?php
  $errors = [];

  if(isset($_POST['sex'])){
    $sexValues = ["男性","女性"];
    if(in_Array($_POST['sex'], $sexValues) ){
      $isSex = $_POST['sex'];
    }else{
      $isSex[] = "「性別」に入力エラーがあります。";
    }
  }else{
    $sexChecked = "男性";
  }

 if(isset($_POST['marriage'])){
   $marriageValues = ["独身","既婚","同棲中"];
   if(in_Array($_POST['marriage'], $marriageValues)){
     $isMarriage = $_POST['marriage'];
   }else{
     $isMarriage = [];
     $errors[] = "「結婚」に入力エラーがあります。";
   }
 }else{
   $isMarriage = "独身";
 }
?>

<?php
  function checked($value, $question){

    if(is_array($question)){
      $isChecked = in_Array($value, $question);
    }else {
      $isChecked = ($value === $question);
    }

    if($isChecked){
      echo "selected";
    }else{
      echo "";
    }
  }
?>

<form  action=<?php echo es($_SERVER['PHP_SELF']); ?> method="post">

  <ul>
    <li><span>性別:</span>
      <select  name="sex">
        <option value="男性" <?php checked("男性", $isSex); ?>>男性</option>
        <option value="女性" <?php checked("女性", $isSex); ?>>女性</option>
      </select>
    </li>
    <li><span>結婚:</span>
      <select name="marriage">
        <option value="独身" <?php checked("独身", $isSex); ?>>独身</option>
        <option value="既婚" <?php checked("既婚", $isSex); ?>>既婚</option>
        <option value="同棲中" <?php checked("同棲中", $isSex); ?>>同棲中</option>
      </select>
    </li>
    <li><input type="submit" value="送信する"></li>
  </ul>

</form>

<?php
  $isSelected = $isSex && $isMarriage;
  if($isSelected){
      echo "<hr>";
      echo "あなたは{$isSex}で、{$isMarriage}ですね";
  }

 ?>

<?php
  if(count($errors) > 0){
    echo "<hr>";
    echo '<span class="error">', implode("<br>", $errors), '</span>';
  }
 ?>
</div>
</body>
</html>
