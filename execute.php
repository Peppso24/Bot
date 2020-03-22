<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$text = trim($text);
$text = strtolower($text);

if($text== "/start")
{
  $text="Benvenuto su questo Bot, utilizza i pulsanti in basso";
}
if($text=="quokka")
{
  $text =" https://www.google.it/url?sa=i&url=https%3A%2F%2Ftwitter.com%2Fchocoila%2Fstatus%2F1172166314812694531&psig=AOvVaw0kwZ81UkCg2Kqa1B4TQy9a&ust=1584983687810000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCIDBh8HKrugCFQAAAAAdAAAAABAJ";
}

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
