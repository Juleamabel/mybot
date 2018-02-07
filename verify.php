<?php
$access_token = 'dQ+KWQQNUvlq23vGeufJaCBTcP5xJkM8o9gp+2B9tl7cLdotOZIsSiVdl0UyG/d3uEPvm5AnzHp7JEoLDpaV+Pmrlo2XL9kH7Zn5M87KzirNnzAblRtvPhF/DR3mrNCBGknB645SJyH2bwz7HmMOgwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>