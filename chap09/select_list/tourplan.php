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

  print_r($_POST['meal']);
  print_r($_POST['tour']);

  if(isset($_POST['meal'])){
    $meals = ["夕食","朝食"];
    $mealCount = array_diff($_POST['meals'], $meals);
    if(count($mealCount) == 0){
      $mealChecked = $_POST['meal'];
    }else{
      $mealChecked = [];
      $errors[] = "「食事」に入力エラーがあります。";
    }
  }else{
    $mealChecked = [];
  }

 if(isset($_POST['tour'])){
   $tours = ["カヌー","MTB","トレラン"];
   $tourCount = array_diff($_POST['tour'], $tours);
   if(count($tourCount) == 0){
     $tourChecked = [];
     $tourChecked = $_POST['tour'];
   }else{
     $tourChecked = [];
     $errors[] = "「ツアー」に入力エラーがあります。";
   }
 }else{
   $tourChecked = [];
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
    <li><span>食事:</span>
      <select name="meal[]" size="2" multiple>
          <option value="朝食" <?php echo checked("朝食", $mealChecked); ?>>朝食</option>
          <option value="夕食" <?php echo checked("夕食", $mealChecked); ?>>夕食</option>
      </select>
    </li>
    <li><span>ツアー:</span>
      <select name="tour[]" size="3" multiple>
          <option value="カヌー" <?php echo checked("カヌー", $tourChecked); ?>>カヌー</option>
          <option value="MTB" <?php echo checked("MTB", $tourChecked); ?>>MTB</option>
          <option value="トレラン" <?php echo checked("トレラン", $tourChecked); ?>>トレラン</option>
      </select>
    </li>
    <li><input type="submit" value="送信する"></li>
  </ul>

</form>

<?php
  $isSelected = (count($mealChecked) > 0) || (count($tourChecked) > 0);
  if($isSelected){
      echo "<hr>";
      echo "お食事", implode("と", $mealChecked), "<br>";
      echo "ツアー", implode("と", $tourChecked), "<br>";
  }else{
    echo "<hr>";
    echo "選択されたものはありません。", "<br>";
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
