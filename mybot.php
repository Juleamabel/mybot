<?php
$access_token = 'dQ+KWQQNUvlq23vGeufJaCBTcP5xJkM8o9gp+2B9tl7cLdotOZIsSiVdl0UyG/d3uEPvm5AnzHp7JEoLDpaV+Pmrlo2XL9kH7Zn5M87KzirNnzAblRtvPhF/DR3mrNCBGknB645SJyH2bwz7HmMOgwdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			if($text == 'hello'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'สวัสดีค้า'
				];
			}
			else if($text == 'cpu'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'หน่วยประมวลผลกลาง ทำหน้าที่'
				];
			}
			else if($text == 'jule'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'คนสวย'
				];
			}
			else if($text == 'Alice'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'คนไม่หล่อ'
				];
			}
			else if($text == 'ไอซ์'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'มีกิ้กใช่ไหม'
				];
			}
		
			// Make a POST Request to Messaging API to reply to sender
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
?>
