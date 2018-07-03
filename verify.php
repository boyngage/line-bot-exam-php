<?php
$access_token = 'kyr6zlGyYJ/qCsTnBkEn5QmJeHxcEoWqji8u7yVCo2exbAitbRoXKKYSAn8LbVxi4So88Gz5uQYrfJLzj0HecagPmj6sGlex5nG+rOgwQIPjjm5yjkmwCBhmag7gYGEL3xXQmNLKeJcX4pQHHb3M3AdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
