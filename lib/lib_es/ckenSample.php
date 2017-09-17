<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<title>XSS対策 es</title>
</head>
<body>

<?php
  require_once("lib_es/util.php");
  $utf8_string = ["こんにちわ","こんばんわ"];
  //$utf8_string = array("こんにちわ","こんばんわ");

  //$sjis_string = mb_convert_encoding($utf8_string, 'Shift-JIS');

  foreach ($utf8_string as $key => $value) {
    $sjis_string[$key] = mb_convert_encoding($value, 'Shift-JIS');
  }

  $myEncording = mb_internal_encoding();

  if(cken([$sjis_string])){
    echo "配列の値は{$myEncording}です";
  }else{
    echo "配列の値は{$myEncording}ではありません！";
  }

?>

</body>
</html>
