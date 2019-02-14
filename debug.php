<?php
header("Content-Type:text/html;charset= utf-8");
Session_Start();
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