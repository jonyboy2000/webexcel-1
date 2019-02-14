<?php

session_start();
$token = $_GET[token];
$seq = $_GET[seq];
set_time_limit(30);
//echo str_repeat(' ', 256);
header("Connection: keep-alive");
header("Content-Type: text/plain;");
ob_flush();
flush();
$fname = $_SESSION['fpath'];
$fhome = $_SESSION['fhome'];
$f = '../' . $fhome . '/' . $fname;
$bn = basename($f);
$fp = dirname($f);

$changname = $fp . '/.' . $bn . '.alive';
$i = 0;
while (true) {
    //echo $i;
    $file = fopen($changname, 'r');
    while (!feof($file)) {
        $data = fgets($file);
        $content = split('=', $data);
        if ($seq <= $content[0]) {
            echo $token;
            flush();
            exit;
        }
        flush();
    }
    fclose($file);
    flush();
    sleep(3);
    $i++;
    if($i>5){
        break;
    }
}
echo 'EXPIRED';
?>
