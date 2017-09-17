<?php
require_once("../../lib/lib_es/util.php");
 ?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div>
      <?php
        $filename = "memo.txt";
        try {
          $fileObj = new SplFileObject($filename , "rb");
        } catch (Exception $e) {
          echo '<span class="error"> エラーがありました。 <span><br>';
          echo $e->getMessage();
          exit();
        }

        $fileObj->flock(LOCK_SH);
        $readdata = $fileObj->fread($fileObj->getSize());
        $fileObj->flock(LOCK_UN);

        if(!($readdata === false)){

          $readdata = es($readdata);
          $readdata_br = nl2br($readdata, false);
          echo "{$filename}を読み込みました。", "<br>";
          echo "{$readdata_br}", "<hr>";
          echo '<a href = "input_memo.php">メモ入力ページへ</a>';
        }else{
          echo '<span class="error"> ファイルの読み込みに失敗しました。 <span><br>';
        }
      ?>
    </div>
  </body>
</html>
