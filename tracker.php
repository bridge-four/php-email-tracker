<?php

$delimiter = "\t";

//THIS RETURNS THE IMAGE
header('Content-Type: image/gif');
readfile('tracking.gif');


//Collect data
$data = [
    'time'      => date('m/d/Y H:i:s'),
    'url'       => "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
    'ip'        => $_SERVER['REMOTE_ADDR'],
    'referer'   => $_SERVER['HTTP_REFERER'],
    'useragent' => $_SERVER['HTTP_USER_AGENT'],
    'browser'   => get_browser(null, true),
];

//Save data to file
file_put_contents('log.txt', implode($delimiter, array_values($data)).PHP_EOL , FILE_APPEND | LOCK_EX);
exit;

?>

