<?php
require("phpMQTT.php");
include_once(".env.php");

$server = $_DB_HOST;
$port = $_DB_PORT;
$topic = $_DB_ILUM;
$topic1 = $_DB_PRESENCA1;
$topic2 = $_DB_PRESENCA2;
$topic3 = $_DB_TEMP;
$topic4 = $_DB_UMID;
$topic5 = $_DB_PRESENCAS1;
$topic6 = $_DB_TREM;
$topic7 = $_DB_STATUS;
$client_id = "phpmqtt-" . rand();

$username = $_DB_USER;
$password = $_DB_PASS;

header('Content-Type: application/json');

$messages = [];

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
if (!$mqtt->connect(true, NULL, $username, $password)) {
    echo json_encode(["error" => "Não foi possível conectar ao broker"]);
    exit;
}

// Subscribing e coletando mensagens por 1-2 segundos
$mqtt->subscribe([$topic => ["qos" => 0, "function" => function ($topic, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$mqtt->subscribe([$topic1 => ["qos" => 0, "function" => function ($topic1, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic1, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$mqtt->subscribe([$topic2 => ["qos" => 0, "function" => function ($topic2, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic2, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$mqtt->subscribe([$topic3 => ["qos" => 0, "function" => function ($topic3, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic3, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$mqtt->subscribe([$topic4 => ["qos" => 0, "function" => function ($topic4, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic4, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$mqtt->subscribe([$topic5 => ["qos" => 0, "function" => function ($topic5, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic5, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$mqtt->subscribe([$topic6 => ["qos" => 0, "function" => function ($topic6, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic6, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$mqtt->subscribe([$topic7 => ["qos" => 0, "function" => function ($topic7, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic7, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$start = time();
while (time() - $start < 2) { // escuta 2 segundos
    $mqtt->proc();
}

$mqtt->close();

echo json_encode($messages);
