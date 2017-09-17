<?php
require_once("../../lib/lib_es/util.php");

if(empty($_POST["memo"])){
  $url = "http://" . $_SERVER["HTTP_HOST"]. dirname($_SERVER['PHP_SELF']);
  header("Location:". $url . "/input_memo.php");
  exit();
}

$memo = $_POST["memo"];
$date = date("Y/n/j G:i:s", time());

$writedata = "---\n" . $date . "\n" . $memo . "\n";

$filename = "memo.txt";

try {
  $fileObj = new SplFileObject($filename , "a+b");
} catch (Exception $e) {
  echo '<span class="error">エラーがありました。</span><br>';
  echo $e->getMessage();
  exit();
}

$fileObj->flock(LOCK_EX);
$result = $fileObj->fwrite($writedata);
$fileObj->flock(LOCK_UN);

$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]);
header("Location:" . $url . "/read_memo.php");
exit();
 ?>
