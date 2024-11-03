<?php
$json = file_get_contents('php://input');
$obj = json_decode($json, true);
$path = dirname(__FILE__);
$server_data = $path.'/data';
$path = $server_data."/".$obj["filename"];
if (substr(realpath(dirname($path)), 0, strlen($server_data))!=$server_data) {
    error_log("attempt to write to bad path: ".$path);
} else {
    file_put_contents($path, $obj["filedata"], FILE_APPEND);
}
?>
