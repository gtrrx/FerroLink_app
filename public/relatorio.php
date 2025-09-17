<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>

    <div class="relatorio-container">
        <div class="relatorio-header">Relatório</div>
        
        <ul class="relatorio-list">
            <li class="relatorio-item">
                <div class="item-header">
                    <span class="item-tipo">Alerta</span>
                    <span class="item-hora">5:15 PM</span>
                </div>
                <div class="item-descricao">Chuva no ponto A</div>
            </li>
            
            <li class="relatorio-item">
                <div class="item-header">
                    <span class="item-tipo chegada">Chegada</span>
                    <span class="item-hora">3:35 PM</span>
                </div>
                <div class="item-descricao">Chegada confirmada, trem B</div>
            </li>
            
            <li class="relatorio-item">
                <div class="item-header">
                    <span class="item-tipo">Alerta</span>
                    <span class="item-hora">1:41 PM</span>
                </div>
                <div class="item-descricao">Manutenção ponto E</div>
            </li>
            
            <li class="relatorio-item">
                <div class="item-header">
                    <span class="item-tipo atencao">Atenção</span>
                    <span class="item-hora">12:41 AM</span>
                </div>
                <div class="item-descricao">Direção para direita para trem A</div>
            </li>
            
            <li class="relatorio-item">
                <div class="item-header">
                    <span class="item-tipo atencao">Atenção</span>
                    <span class="item-hora">9:41 PM</span>
                </div>
                <div class="item-descricao">Direção para esquerda para trem B</div>
            </li>
            
            <li class="relatorio-item">
                <div class="item-header">
                    <span class="item-tipo informacao">Informação</span>
                    <span class="item-hora">4:31 AM</span>
                </div>
                <div class="item-descricao">Chegada do trem C</div>
            </li>
            
            <li class="relatorio-item">
                <div class="item-header">
                    <span class="item-tipo">Alerta</span>
                    <span class="item-hora">7:21 AM</span>
                </div>
                <div class="item-descricao">Trem E parado para manutenção</div>
            </li>
            
            <li class="relatorio-item">
                <div class="item-header">
                    <span class="item-tipo">Alerta</span>
                    <span class="item-hora">9:40 AM</span>
                </div>
                <div class="item-descricao">Abastecer trem D</div>
            </li>
        </ul>
    </div>
    <div class="bottom-menu">
        <a href="../public/menu.php" class="menu-item">🏠  Inicio</a>
        <a href="../public/info.php" class="menu-item">ℹ️ Info</a>
        <a href="../public/relatorio.php" class="menu-item">📊 Relatorio</a>
        <a href="../public/linha.php" class="menu-item">📈 Linha</a>
        <a href="../public/perfil.php" class="menu-item">👤 Perfil</a>
    </div>
    
</body>
</html>