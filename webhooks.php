<?php


$API_URL = 'https://api.line.me/v2/bot/message/reply';
$ACCESS_TOKEN = 'kyr6zlGyYJ/qCsTnBkEn5QmJeHxcEoWqji8u7yVCo2exbAitbRoXKKYSAn8LbVxi4So88Gz5uQYrfJLzj0HecagPmj6sGlex5nG+rOgwQIPjjm5yjkmwCBhmag7gYGEL3xXQmNLKeJcX4pQHHb3M3AdB04t89/1O/w1cDnyilFU='; // Access Token ค่าที่เราสร้างขึ้น
$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array

if ( sizeof($request_array['events']) > 0 )
{

 foreach ($request_array['events'] as $event)
 {
  $reply_message = '';
  $reply_token = $event['replyToken'];

  if ( $event['type'] == 'message' ) 
  {
   if( $event['message']['type'] == 'text' ) //ข้อความ
   {
    //$text = $event['message']['text'];
        //$reply_message = $event['message']['text'];
        $reply_message = intval($event['message']['text']) + 2;
   }
   else
   {
        $reply_message = '2.ระบบได้รับ '.ucfirst($event['message']['type']).' ของคุณแล้ว';
   }
    
  
  }
  else
   $reply_message = '3.ระบบได้รับ Event '.ucfirst($event['type']).' ของคุณแล้ว';
 
  if( strlen($reply_message) > 0 )
  {
   //$reply_message = iconv("tis-620","utf-8",$reply_message);
   $data = [
    'replyToken' => $reply_token,
    'messages' => [['type' => 'text', 'text' => $reply_message]]
   ];
   $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

   $send_result = send_reply_message($API_URL, $POST_HEADER, $post_body);
   echo "Result: ".$send_result."\r\n";
  }
 }
}

echo "OK";

function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_PROXY, 'velodrome.usefixie.com:80');
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'fixie:wkPhrly3DVe1Bd7');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

?>
