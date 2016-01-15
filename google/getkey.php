<?php 
//$command = escapeshellcmd('./service-account.py');
$command = escapeshellcmd('/home/www.depot/v2.dnpb.gov.ua/root/wp-content/themes/dnpb/google/service-account.py');
$output = shell_exec($command);
$key = trim(preg_replace('/\s\s+/', '', $output));
echo $key;
?>
