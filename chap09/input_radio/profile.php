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

    if(isset($_POST["sex"])){
      $sexValues = ["男性","女d性"];
      $isSex = in_Array($_POST["sex"], $sexValues);

      if($isSex){
        $sex = $_POST["sex"];
      }else{
        $sex = "error";
        $error[]= "「性別」に入力エラーがありました。";
      }
    }else{
      $isSex = false;
      $sex = "男性";
    }

    if(isset($_POST["marriage"])){
      $marriageValues = ["独身","既婚","同棲中"];
      $isMarriage = in_Array($_POST["marriage"], $marriageValues);

      if($isMarriage){
        $marriage = $_POST["marriage"];
      }else{
        $marriage = "error";
        $error[]= "「結婚」に入力エラーがありました。";
      }

    }else{
      $isSex = false;
      $sex = "独身";
    }
  ?>

  <?php
    function checked($value, $question){
      if(is_array($question)){
        $isChecked = in_Array($value, $question);
      }else{
        $isChecked = ($value === $question);
      }

      if($isChecked){
        echo "checked";
      }else{
        echo "";
      }
    }
  ?>

<form method="post", action=<?php echo es("$_SERVER[PHP_SELF]"); ?>
  <ul>
    <li><span>性別：</span>
      <label><input type="radio" name="sex" value="男性" <?php echo checked("男性" ,$sex); ?> > 男性</label>
      <label><input type="radio" name="sex" value="女性" <?php echo checked("女性" ,$sex); ?> > 女性</label>
    </li>
    <li><span>結婚：</span>
      <label><input type="radio" name="marriage" value="独身" <?php echo checked("独身" ,$_POST["marriage"] ); ?>>独身</label>
      <label><input type="radio" name="marriage" value="既婚" <?php echo checked("既婚" ,$_POST["marriage"] ); ?>>既婚</label>
      <label><input type="radio" name="marriage" value="同棲中" <?php echo checked("同棲中" ,$_POST["marriage"] ); ?>>同棲中</label>
    </li>
    <li><input type="submit" value="送信する"></li>
  </ul>
</form>

<?php
  if($isSex && isMarriage ){
    echo "<hr>";
    echo "あなたは、{$sex}で{$marriage}です";
  }

  if(count($error) > 0){
    echo '<span = ”error”>' , implode("<br>", "$error"), '</span>';
  }
 ?>
</div>
</body>
</html>
