<?php
function oneUp( &$var ){
  $var += 1;
}

function hello($who){
  echo $who , "こんにちわ";
}

function bye($who){
  echo $who , "さようなら";
}


$var = 5;
oneUp($var);
echo $var,"\n";


$test=1;
$name = "test";
$$name +=1;
$test  +=2;

echo $var,"\n";
echo "<br>";
echo $test,"\n";
echo $test1."です","\n";

$func= "bye";
$who = "dare";

$dare = "赤井さん";

$func($$who);

echo "<br>";
$myfunction = function($dare) use ($test){
  echo "無名で" , $dare , "です" , $test;
};

$myfunction($dare);

echo "<br>";
$num = number_format(1234.56,1);
$moji = "%'a-7.2f";
echo $num, $moji, "<br>";
$num1= 124.56789;
printf($moji , $num1);

function price($str){
  $str_len = mb_strlen($str);


  if($str_len > 10){
    $str_result = (int)$str + (($str_len - 10) * 100);
  }else{
    $str_result = (int)$str;
  }

  echo "<br>";
  echo "文字数：", $str_len , " 金額：{$str_result}円";

  echo "<br>";
  $substr_mae = sprintf("文字数：%d 金額：%d円", $str_len, $str_result );
  echo mb_substr($substr_mae,1,-3);

  echo "<br>";
  $hankaku = "PHP7をはじめよう !!     がっつ                     ";
  echo $hankaku;
  echo "<br>";
  echo mb_convert_kana($hankaku, "ash");
  echo "<br>";
  echo trim(mb_convert_kana($hankaku, "ash"));
  echo "<br>";
  $msg = "東京<->京都 'Eat & Run' ツアー";
  echo $msg;
}

price("1000");
 ?>

 <! DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Hello World!</title>
 </head>
 <body>
   <?php
     $msg = "東京<->京都 'Eat & Run' ツアー";
     echo $msg;
     //echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
   ?>
 </body>
 </html>
