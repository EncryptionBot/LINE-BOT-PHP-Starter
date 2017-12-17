<?php
$access_token = '1WhZWKXrAG0nHooi38yXieCxETFb9BKdD/d8/8CHInoH5/qHlifvexSAZ7chqABz0jjUsMgk7XATPcWD7maKkjNuXcwERUwlTjFXtqqznrgl2wNtaCPn22WbQar9vUld5iaSNyVU1b+WHngffip9twdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
