<?php

require_once __DIR__ . '/phpMQTT.php';
require_once __DIR__ . '/env_loader.php';

// Carregar variáveis do .env
loadEnv(__DIR__ . '/.env');

// Pegando valores carregados
$topic = $_ENV["TOPIC_ILUM"];
$topic1 = $_ENV["TOPIC_PRESENCA1"];
$topic2 = $_ENV["TOPIC_PRESENCA2"];
$topic3 = $_ENV["TOPIC_TEMP"];
$topic4 = $_ENV["TOPIC_UMID"];
$topic5 = $_ENV["TOPIC_PRESENCAS1"];
$topic6 = $_ENV["TOPIC_TREM"];
$topic7 = $_ENV["TOPIC_STATUS"];
$topic8 = $_ENV["TOPIC_SER1"];
$topic9 = $_ENV["TOPIC_SER2"];
$topic10 = $_ENV["TOPIC_PRESENCAS3"];
$server   = $_ENV["MQTT_HOST"];
$port     = (int) $_ENV["MQTT_PORT"];
$username = $_ENV["MQTT_USER"];
$password = $_ENV["MQTT_PASS"];

$client_id = "php-client-" . uniqid();

header('Content-Type: application/json');

$messages = [];

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);

$mqtt->socketContext = stream_context_create([
    'ssl' => [
        'verify_peer' => true,
        'verify_peer_name' => true,
        'cafile' => __DIR__ . '/certs/BaltimoreCyberTrustRoot.crt'
    ]
]);

$mqtt->ssl = true;

if (!$mqtt->connect(true, NULL, $username, $password)) {
    echo json_encode(["error" => "Falha ao conectar ao HiveMQ"]);
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

$mqtt->subscribe([$topic8 => ["qos" => 0, "function" => function ($topic8, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic8, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$mqtt->subscribe([$topic9 => ["qos" => 0, "function" => function ($topic9, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic9, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$mqtt->subscribe([$topic10 => ["qos" => 0, "function" => function ($topic10, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic10, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$start = time();
while (time() - $start < 8) {
    $mqtt->proc();
    usleep(100000); // evita travar CPU
}

$mqtt->close();

echo json_encode($messages);

?>