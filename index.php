<?php
echo "Nothing to see here!";

$access_token = '1WhZWKXrAG0nHooi38yXieCxETFb9BKdD/d8/8CHInoH5/qHlifvexSAZ7chqABz0jjUsMgk7XATPcWD7maKkjNuXcwERUwlTjFXtqqznrgl2wNtaCPn22WbQar9vUld5iaSNyVU1b+WHngffip9twdB04t89/1O/w1cDnyilFU=';

$content = file_get_contents('php://input');
$events = json_decode($content, true);
if (!is_null($events['events'])) {
	foreach ($events['events'] as $event) {
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			$text = $event['message']['text'];
			$replyToken = $event['replyToken'];
			$messages = [
				'type' => 'text',
                'text' => $text
                
            $messages = [
                'type' => '1+1',
                'text' => '2'

			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";

