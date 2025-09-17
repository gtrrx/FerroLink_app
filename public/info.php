<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
    <title>Informações</title>
</head>
<body>

    <div class="container">
        <h1>Informações</h1>
        
        <ul class="checkbox-list">
            <li class="checkbox-item">
                <input type="checkbox" id="tremA">
                <label for="tremA">Trem A</label>
            </li>

            <li class="checkbox-item">
                <input type="checkbox" id="freio">
                <label for="freio">Freio</label>
            </li>

            <li class="checkbox-item">
                <input type="checkbox" id="abastecimento">
                <label for="abastecimento">Abastecimento</label>
            </li>

            <li class="checkbox-item">
                <input type="checkbox" id="acoplamento">
                <label for="acoplamento">Acoplamento dos vagões</label>
            </li>

            <li class="checkbox-item">
                <input type="checkbox" id="funcionarios">
                <label for="funcionarios">Funcionários</label>
            </li>

            <li class="checkbox-item">
                <input type="checkbox" id="rota">
                <label for="rota">Rota</label>
            </li>

            <li class="checkbox-item">
                <input type="checkbox" id="revisoes">
                <label for="revisoes">Revisões</label>
            </li>

            <li class="checkbox-item">
                <input type="checkbox" id="velocidade">
                <label for="velocidade">Velocidade</label>
            </li>

            <li class="checkbox-item">
                <input type="checkbox" id="partidaProgramada">
                <label for="partidaProgramada">Partida programada</label>
            </li>

            <li class="checkbox-item">
                <input type="checkbox" id="partidaReal">
                <label for="partidaReal">Partida real</label>
            </li>

            <li class="checkbox-item">
                <input type="checkbox" id="horarioChegada">
                <label for="horarioChegada">Horário de chegada</label>
            </li>

        </ul>
    </div>

    <button type="submit"><a href="">Avançar</a></button>


    <div class="bottom-menu">
        <a href="../public/menu.php" class="menu-item">🏠  Inicio</a>
        <a href="../public/info.php" class="menu-item">ℹ️ Info</a>
        <a href="../public/relatorio.php" class="menu-item">📊 Relatorio</a>
        <a href="../public/linha.php" class="menu-item">📈 Linha</a>
        <a href="../public/perfil.php" class="menu-item">👤 Perfil</a>
    </div>
    
</body>
</html>