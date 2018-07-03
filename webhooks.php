<?php // callback.php

require "vendor/autoload.php";
$access_token = '4T08V0C3yyTmsyXD37YAZEPtHNuZ5D10NOawrOS/j6SYleovVuvh8CdGN65nRfBjFhBKI58+joTVDaY4aTuAj7EvoIejAoD6BNce0+clMECRrAvipZ8LoSrc3IvfTbQQ8qsYaQqoEz3yBM8fOHZovQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '335ff1c117bcb003169d73477f504b77';
$idPush = '1591506977'
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage('U7ef7a449f2a5c2057eacfc02ba2eb286', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
