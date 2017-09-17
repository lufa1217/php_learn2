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
        $filename = "mytext.txt";
        try {
          $fileObj = new SplFileObject($filename , "rb");
        } catch (Exception $e) {
          echo '<span class="error"> エラーがありました。 <span><br>';
          echo $e->getMessage();
          exit();
        }

        $readdata = $fileObj->fread($fileObj->getSize());
        if(!($readdata === false)){

          $readdata = es($readdata);
          $readdata_br = nl2br($readdata, false);
          echo "{$readdata_br}を読み込みました。", "<br>";
          echo '<a href = "write_file.php">ファイルを書き込む</a>';
        }else{
          echo '<span class="error"> ファイルの読み込みに失敗しました。 <span><br>';
        }
      ?>
    </div>
  </body>
</html>
