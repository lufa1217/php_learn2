<?php

$couponList = ["nf23qw" => 0.75, "ha45as" => 0.8, "hf56zx" => 8.5];
$priceList = ["ax101" => 2300, "ax102" => 2900];

function getCouponList($code){
  global $couponList;

  if(array_key_exists($code, $couponList)){
    return $couponList[$code];
  }else{
    return NULL;
  }
}

function getPriceList($code){
  global $priceList;
  
  if(array_key_exists($code, $priceList)){

    return $priceList[$code];
  }else{
    return NULL;
  }
}

 ?>
