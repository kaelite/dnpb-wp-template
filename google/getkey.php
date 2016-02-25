<?php 
//$command = escapeshellcmd('./service-account.py');
$command = escapeshellcmd(__DIR__.'/service-account.py');
$output = shell_exec($command);
$key = trim(preg_replace('/\s\s+/', '', $output));
echo $key;
?>
