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
  $isDate = false;

  if(isset($_POST['theDate'])){
    $postData = trim($_POST['theDate']);
    $postData = mb_convert_kana($postData, 'as');

    $pattern1 = preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $postData);
    $pattern2 = preg_match("#^[0-9]{4}/[0-9]{2}/[0-9]{2}$#", $postData);
    if($pattern1){
      $dateArray = explode("-", $postData);
    }else if ($pattern2){
      $dateArray = explode("/", $postData);
    }

    if($pattern1 || $pattern2){
      $theYear = $dateArray[0];
      $theMonth = $dateArray[1];
      $theDay = $dateArray[2];

      $isDate = checkdate($theMonth, $theDay, $theYear) ;

      if ($isDate) {
        $dateObj = new DateTime($postData);
      }else{
        $errors[] = "日付として正しくありません";
      }
    }else{
      $today = new DateTime();
      $today1 = $today->format("Y-m-j");
      $today2 = $today->format("Y/m/j");

      $errors[] = "日付は次のどちらかの形式で入力してください<br>{$today1}または{$today2}";
    }

  }else{
    $mealChecked = [];
  }
  ?>

<form  action=<?php echo es($_SERVER['PHP_SELF']); ?> method="post">
    <ul>
    <li><span>日付を選ぶ:</span>
      <input type="date" name="theDate" value= <?php echo $postData; ?> >
    </li>
    <li><input type="submit" value="送信する"></li>
  </ul>
</form>

<?php
  if($isDate){
    $date = $dateObj->format("Y年m月d日");
    $w = $dateObj->format("w");

    $week = ["日","月","火","水","木","金","土"];
    $youbi = $week[$w];

    echo "<hr>";
    echo "{$date}は、{$youbi}曜日です。";
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
