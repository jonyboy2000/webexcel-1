<?php

$value = '=X10-R5/C12*(AC12+C6)';
//$x = preg_replace('/([A-Za-z]+[0-9]+)/', "GetCell('$1')", $value);
$x = preg_replace('/([A-Za-z]+)([0-9]+)/', "GetCell('$1',$2)", $value);
echo $x;
exit;
$str='AC';
$res=0;
$len=strlen($str)-1;
for ($i =0;$i<=$len; $i++) {
    $res =$res+ (ord($str[$len-$i]) - 65) + ($len-$i) * 26;
}
echo $res;exit;
//try { eval("value"+check_js($cmd));
//} catch ($err) {
//alert(trans("Error evaluating")+" "+buildColName(col)+(row+1)+" \""+value+"\"\n\n"+err+"\n\n"+trans("value")+cmd);
//}
//header("Content-Type:text/html;charset= utf-8");
//Session_Start();
echo "<pre>";
echo "本页得到的_GET变量有:";
print_R($_GET);

echo "本页得到的_POST变量有:";
Print_R($_POST);

//echo "本页得到的GLOBALS变量有:";
//print_R($GLOBALS); 

echo "\n本页得到的_COOKIE变量有:";
print_R($_COOKIE);

echo "本页得到的_SESSION变量有:";
Print_R($_SESSION);
?>