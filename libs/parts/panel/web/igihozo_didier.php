<?php
session_start();

@$con=mysql_connect("localhost","root","");
@$sel=mysql_select_db("seveeen_bms");
date_default_timezone_set("Africa/Kigali");
//--------------------------------------------------------------------------------------------------------------------------------------------functions
// ----------------------------STANDARD BIG INTERGER (comma separetor)
function standard_big_int($amount,$separator,$dig_interval){
  $holder="";$count=strlen($amount);
      if (strlen($amount)<$dig_interval+1) {
      $holder=$amount;
    }
  while ($count>$dig_interval) {
    if ($count==strlen($amount)) {
      $holder=substr($amount, $count-$dig_interval,$dig_interval);
    }else{
      $holder=substr($amount, $count-$dig_interval,$dig_interval).$separator.$holder;
    }
    $count-=$dig_interval;
    if ($count<=$dig_interval) {
      $holder=substr($amount, 0,$count).$separator.$holder;
    }
  }
  return $holder;
}
// ----------------------------STANDARD MONEY FORMAT (comma separetor)
function standard_money($money){
  return mysql_real_escape_string(stripcslashes(standard_big_int($money,",",3)));
}
// ----------------------------Getting safe inputs
function get_input($inpt){
  return mysql_real_escape_string(stripslashes($_GET[$inpt]));
}
function is_numeric_array($arrayo){
  $io=0;
  foreach ($arrayo as $keyo => $valueo) {
    if (is_int($keyo)) {
      ++$io;
    }
  }
  if (count($arrayo)===$io) {
    return true;
  }else{
    return false;
  }
}
?>