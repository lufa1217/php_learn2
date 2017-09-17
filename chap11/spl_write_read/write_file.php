<?php
$date= date("Y/n/j G:i:s", time());

$writedata = <<< "EOD"
ヒアドキュメントならば、
途中で開業したり、
変数を使った文章が作れますね。
更新日：$date
EOD;

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
          $fileObj = new SplFileObject($filename , "wb");
        } catch (Exception $e) {
          echo '<span class="error"> エラーがありました。 <span><br>';
          echo $e->getMessage();
          exit();
        }

        $writeResult = $fileObj->fwrite($writedata);
        if($writeResult === false){
          echo '<span class="error"> ファイルの書き込みに失敗しました。 <span><br>';
        }else{
          echo "SplFileObjectのfwriteをしようして{$filename}に{$writeResult}バイト書き出しました。", "<hr>";
          echo '<a href = "read_file.php">ファイルを読む</a>';
        }
      ?>
    </div>
  </body>
</html>
