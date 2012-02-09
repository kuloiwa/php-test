<?php
/*
2012-02-09
3つを入れ替えテスト
*/


$testtime = date("Y/m/d");
echo strtotime($testtime);
print "<br>";

if( isset($_COOKIE['fchk']) ){
  $test = $_COOKIE['fchk'];
  echo $test;
  $cookie_val = explode("|", $_COOKIE['fchk']);
  $c = $cookie_val[0];
  $p = $cookie_val[1];
/*
} else {
*/
  $d1 = date("Y/m/d"); //今日の日付その2
  $d2 = "2000/10/20";
  $chk_d = (strtotime($d1)-strtotime($d2))/(3600*24);

  print "<br>";
  echo $chk_d;
  print "<br>";

  $c=$chk_d & 3;

  print "<br>";
  echo $c;
  print "<br>";

 $p=0;
}

$t = date("Ymd"); //今日の日付
/*
$t = 20120210;
*/
print "<br>p=";
print $p."<br>";
print "<br>t=";
print $t."<br>";

// チェック用の値をチェック
if ($t!=$p) {
  if ($c==0) {
    $c=1;
  } elseif ($c==1) {
    $c=2;
  } else {
    $c=0;
  } 
}

// 値を配列に格納
$cookie_array = array($c, $t);

// 配列をタブ区切りの文字列に変換
$cookie = implode("|", $cookie_array);

//クッキーを書き込む
setcookie('fchk', $cookie, time() + 30 * 24 * 3600);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>PHP-TEST</title>
</head>

<body>
  
  <div id="content">
  
  <?php
  
  //切り替え
  if ($c==0) {
    //Cを表示
    $fla_clsid="ciCCC";
    $fla_id="idCCC";
    $fla_file="CCC.swf";
  } elseif ($c==1) {
    //Bを表示
    $fla_clsid="ciBBB";
    $fla_id="idBBB";
    $fla_file="BBB.swf";
  } else {
    //Aを表示
    $fla_clsid="ciAAA";
    $fla_id="idAAA";
    $fla_file="AAA.swf";
  }

  $test_print = "<h1>" . $fla_clsid . "</h1><h2>" . $fla_id . "</h2><p>" . $fla_file . "</p>";
  
  print ($test_print);
  
  ?>
  
  </div>
  
</body>
</html>
