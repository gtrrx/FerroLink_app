<?php
require("phpMQTT.php");
require("env_loader.php");

header('Content-Type: application/json');

$server = getenv("MQTT_HOST");
$port = getenv("MQTT_PORT");

$topics = [
    getenv("TOPIC_ILUM"),
    getenv("TOPIC_PRESENCA1"),
    getenv("TOPIC_PRESENCA2"),
    getenv("TOPIC_TEMP"),
    getenv("TOPIC_UMID"),
    getenv("TOPIC_PRESENCAS1"),
    getenv("TOPIC_TREM"),
    getenv("TOPIC_STATUS"),
    getenv("TOPIC_SER1"),
    getenv("TOPIC_SER2"),
    getenv("TOPIC_PRESENCAS3"),
];

$client_id = "phpmqtt-" . rand();
$username = getenv("MQTT_USER");
$password = getenv("MQTT_PASS");

$messages = [];

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);

if (!$mqtt->connect(true, NULL, $username, $password)) {
    echo json_encode(["error" => "Não foi possível conectar ao broker"]);
    exit;
}

foreach ($topics as $t) {
    if (!$t) continue;
    $mqtt->subscribe([
        $t => [
            "qos" => 0,
            "function" => function ($topic, $msg) use (&$messages) {
                $messages[] = [
                    "topic" => $topic,
                    "msg" => $msg,
                    "time" => date("H:i:s")
                ];
            }
        ]
    ], 0);
}

$start = time();
while (time() - $start < 2) {
    $mqtt->proc();
}

$mqtt->close();
echo json_encode($messages);