<?php
$max = 100;
$min = 10;
$ave = 50;

$test = 111;

$data = array($max, $min, $ave, $test);

$format = '最大:%d, 最小：%d, 平均：%d';

vprintf($format, $data);
?>

<BR>

<?php
$price  = 1920 * 2;
$kingaku = number_format($price);
echo $kingaku, "円";

echo "<br>";
$test = sprintf("%d", $price);

echo mb_strlen($test);

echo "<br>";
$test2 = "あいうえおかきくけこ";

echo mb_substr($test2, 2), "\n";
echo mb_substr($test2, 2, 10), "\n";

 ?>
