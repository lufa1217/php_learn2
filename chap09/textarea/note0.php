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

    //$_POST = es($_POST);
   ?>

 <?php
  $errors = [];

  if(isset($_POST['note'])){
    $note = $_POST['note'];
    $note = strip_tags($note);
    $note = mb_substr($note, 0, 150 );
    $note = es($note);
  }else{
    $note = "";
  }
?>

<form  action=<?php echo es($_SERVER['PHP_SELF']); ?> method="post">
  <ul>
    <li><span>ご意見:</span>
      <textarea name="note" rows="5" cols="30" maxlength="150" placeholder="こめんとをどうぞ">
        <?php echo $note; ?>
      </textarea>
    </li>
    <li><input type="submit" value="送信する"></li>
  </ul>
</form>

<?php
  if(mb_strlen($note) > 0 ){
    echo "<hr>";
    $note_br = nl2br($note, false);
    echo $note_br;
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
