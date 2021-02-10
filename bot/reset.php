<?php

// ----------------DELETE WEBHOOK---------------
$url =  "https://api.telegram.org/bot1582780453:AAHJMqxlgXYpAIf8IQ1H1rrQtYirx_2Xds4/deletewebhook";

// ----------------UPDATE WEBHOOK---------------
$url =  "https://api.telegram.org/bot1582780453:AAHJMqxlgXYpAIf8IQ1H1rrQtYirx_2Xds4/setwebhook?url=https://b31418e48b93.ngrok.io/bengkel/bot/index.php";

$proxy = "";
$ch = curl_init();


if ($proxy == "") {
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CAINFO => "C:\cacert.pem"
    );
} else {
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_PROXY => "$proxy",
        CURLOPT_CAINFO => "C:\cacert.pem"
    );
}

curl_setopt_array($ch, $optArray);
$result = curl_exec($ch);

$err = curl_error($ch);
curl_close($ch);

if ($err <> "") echo "Error: $err";
else echo "Reset Webhook Berhasil";
