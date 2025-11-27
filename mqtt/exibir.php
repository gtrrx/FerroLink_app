<?php
header("Refresh: 2"); // Atualiza a cada 2 segundos

$arquivo = "mensagens_mqtt.txt";

if (file_exists($arquivo)) {
    $mensagens = file_get_contents($arquivo);

    // Exibe as mensagens com formatação e quebras de linha
    echo "<pre>" . nl2br($mensagens) . "</pre>";
} else {
    echo "Nenhuma mensagem recebida ainda...";
}
?>
