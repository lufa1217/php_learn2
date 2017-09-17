<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<title>XSS対策 es</title>
</head>
<body>

<?php
  require_once("lib_es/util.php");
  $mycode = "<h2>テスト１</h2>";
  $myArray = ["a" => "<p>赤</p>", "b" => "<script>alert('hellow')</script>"];

  echo '$mycode の値', es($mycode);
  echo "\n\n";
  echo '$myArray の値';
  print_r(es($myArray));
?>

</body>
</html>
