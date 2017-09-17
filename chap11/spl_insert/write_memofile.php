<?php
require_once("../../lib/lib_es/util.php");

if(empty($_POST["memo"])){
  $url = "http://" . $_SERVER["HTTP_HOST"]. dirname($_SERVER['PHP_SELF']);
  header("Location:". $url . "/input_memo.php");
  exit();
}

$memo = $_POST["memo"];
$date = date("Y/n/j G:i:s", time());
$writedata = $date . "   " . $memo ;

$filename_wk = "working.tmp";

try {
  $fileObj = new SplFileObject($filename_wk , "wb");
  $fileObj->flock(LOCK_EX);
  $result = $fileObj->fwrite($writedata);
  $fileObj->flock(LOCK_UN);

} catch (Exception $e) {
  echo '<span class="error">エラーがありました。</span><br>';
  echo $e->getMessage();
  exit();
}

$filename = "memo.txt";





$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]);
header("Location:" . $url . "/read_memo.php");
exit();
 ?>
