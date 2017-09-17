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
  echo "<br>";

  function is_Plus($data){
    if($data > 0){
      return true;
    }else{
      return false;
    }
  }

  $data1 = ["a"=>1, "b"=>-1, "C"=>3];
  $data2 = array_filter($data1, "is_Plus");
  print_r($data2);
  echo "<br>";


  $data_in = ["a", "b", "c"];
  list($data1, $data2, $data3) = $data_in;
  echo $data1, $data2, $data3;
  echo "<br>";


  $data = ["1","4","3","40","5"];
  sort($data);
  print_r($data);
  rsort($data);
  print_r($data);
  echo "<br>";

  $data = ["1","4","3","40","5"];
  $clone = $data;
  sort($data);
  print_r($clone);
  print_r($data);
  echo "<br>";

  $data = ["a"=>1, "c"=>-1, "b"=>3, "d"=>0];
  asort($data);
  print_r($data);
  echo "<br>";

  $data = ["a"=>1, "c"=>-1, "b"=>3, "d"=>0];
  for($i = 0; $i <3; $i++){
    shuffle($data);
    print_r($data);
    echo "<br>";
  };
  echo "<br>";

  $data1 = ["1","4","3","40","5"];
  print_r($data1);
  $data2 = array_reverse($data1,true);
  print_r($data2);
  echo "<br>";
  echo "<br>";

  $data1 = ["a1","a4","a3","a40","a5"];
  $result = natsort($data1);
  var_dump($result);
  echo "<br>";
  print_r($data1);
  echo "<br>";

  $data1 = ["1","3","5"];
  $data2 = ["1","4","3","40","5"];

  foreach ($data2 as $ldata) {
      if(in_array($ldata, $data1)){
        echo "{$ldata}は合格",PHP_EOL;
      }
      else{
        echo "{$ldata}は不合格",PHP_EOL;
      }
  }
  echo "<br>";
  echo "<br>";

  $data = ["a"=>1, "c"=>-1, "b"=>3, "d"=>0];

  IF(array_search("a",$data)){echo $data["a"];}
  IF(array_search("c",$data)){echo $data["c"];}

  echo "<br>";
  echo "<br>";

  $data1 = ["1","3","5"];
  $data2 = ["1","4","3","40","5"];
  $data3 = array_diff($data2,$data1);
  print_r($data3);

  foreach ($data3 as $ldata) {
    echo "{$ldata}",PHP_EOL;
  }
  echo "<br>";
  echo "<br>";


  $data1 = ["aa","ab"];
  $data2 = ["xx","zz"];
  $data3 = ["aa1","ab4","ab3","aa40","a5"];

  $result = str_replace($data1,$data2,$data3);
  print_r($result);
  echo "<br>";
  echo "<br>";

  $nameList = ["aa1","ab4","ab3","aa40","a5"];
  $pattern = "/.*a4./";

  $result = preg_grep($pattern,$nameList);
  echo "該当".count($result), "<br>";
  print_r($result);
  echo "<br>";

  $result = preg_grep($pattern,$nameList, PREG_GREP_INVERT);
  echo "非該当".count($result), "<br>";
  print_r($result);
  var_dump($result[0]);


  echo "<br>";
  echo "<br>";

  $data = [];
  $data[] = ["name" => "赤井さん", "age" => 39 , "phone" => "090-4024-3222"];
  $data[] = ["name" => "蒼井さん", "age" => 11 , "phone" => "090-4444-1111"];
  $data[] = ["name" => "黄瀬さん", "age" => 22 , "phone" => "090-4334-2222"];

  $pattern = "/(-)\d{4}$/";
  $replacement = "$1****";

  foreach ($data as $data2) {
    $result = preg_replace($pattern, $replacement, $data2);

    foreach ($result as $key => $value) {
      echo "{$key}の値は、{$value}", "<br>";
    }
  }

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
