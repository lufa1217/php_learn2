<?php




function teamList($teamName){
  $myArrrayA = ["赤","青","黄","白"];
  $myArrrayB = ["赤","青","黄","白"];

  $team = ["チームA" => "A","チームB" => "B"];
  $team["チームC"] = "C";

  $data = "東,西,南,北";
  $data_array = explode(",",$data);
  print_r($data_array);
  echo "<br>";

  $data_string = implode(",",$data_array);
  print_r($data_string);
  echo "<br>";

  $array_splice = ["a","b","c","d","e","f","g"];
  $remove = array_splice($array_splice,1,2);
  print_r($array_splice);
  print_r($remove);
  echo "<br>";

  $array_splice2 = ["a","b","c","d","e","f","g"];
  $replace_splice2 = ["bb"];
  $remove2 = array_splice($array_splice2,1,2,$replace_splice2);
  print_r($array_splice2);
  print_r($remove2);
  echo "<br>";

  $rearray_splice = ["a" => 10, "b" => 20, "c" => 30, "d" => 40 ,"e" => 50,"f" => 60,"g" => 70];
  $reremove = array_splice($rearray_splice,1,2);
  print_r($rearray_splice);
  print_r($reremove);
  echo "<br>";

  $rearray_splice2 = ["a" => 10, "b" => 20, "c" => 30, "d" => 40 ,"e" => 50,"f" => 60,"g" => 70];
  $rereplace_splice2 = ["bb" => 22, "cc" => 33];
  $reremove2 = array_splice($rearray_splice2,1,2,$rereplace_splice2);
  print_r($rearray_splice2);
  print_r($reremove2);
  echo "<br>";

  $array_splice3 = ["a","b","c","d","e","f","g"];
  $replace_splice3 = ["bb"];
  print_r(array_merge($array_splice3,$replace_splice3));
  echo "<br>";

  $rearray_splice3 = ["a" => 10, "b" => 20, "c" => 30, "d" => 40 ,"e" => 50,"f" => 60,"g" => 70];
  $rereplace_splice3 = ["b" => 22, "cc" => 33];
  print_r(array_merge($rearray_splice3,$rereplace_splice3));
  echo "<br>";

  print_r(array_merge_recursive($rearray_splice3,$rereplace_splice3));
  echo "<br>";

  $data1 = ["a","b","c","d","e","f","g"];
  $data2 = ["aa","bb","cc","dd","ee","ff","gg"];
  $result = array_combine($data1,$data2);
  print_r($result);
  echo "<br>";

  $data1 = ["a","b","c","d","e","f","g"];
  $data2 = ["aa","bb","cc","dd","aa","ff","gg"];
  $result = array_combine($data1,$data2);
  $result_unique = array_unique($result);
  print_r($result_unique);
  echo "<br>";

  $data1 = ["a","b","c","d","e","f","g"];
  $data2 = ["aa","bb","cc","dd","aa","ff","gg"];
  $result = array_combine($data1,$data2);
  $result_splice = array_splice($result,3,-2);
  print_r($result_splice);
  echo "<br>";


  $data1 = ["赤井さん","蒼井さん","黄瀬さん","緑間さん","紫さん"];
  $data2 = ["1","2","3","4","5"];
  $result = array_combine($data1,$data2);
  echo "<ol>";
  foreach ($result as $value) {
    echo "<li>", $value, "</li>", PHP_EOL ;
    $sum += $value;
  }
  echo "</ol>";

  echo $sum;


  $sum = 0;
  $data1 = ["赤井さん","蒼井さん","黄瀬さん","緑間さん","紫咲さん"];
  $data2 = ["1","2","3","4","5"];
  $result = array_combine($data1,$data2);
  echo "<ol>";
  foreach ($result as $key => $value) {
    echo "<li>", "キー{$key}の値：", $value, "</li>", PHP_EOL ;
    $sum += $value;
  }
  echo "</ol>";

  echo $sum;
  echo array_sum($data2);
  echo "<br>";


  echo $sum;
  echo array_sum($data2);
  echo "<br>";
}

?>

<! DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列テスト</title>
</head>
<body>
  <?php
    teamList("チームA");
  ?>
</body>
</html>
