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
    <div class="info-container">
        <div class="info-title">Perfil</div>

        <div class="flex">
            <div class="usuario">
                <label for="tremA" class="trem-name">Usuário:</label>
                <span class="trem-info">Junin</span>
            </div>

            <div class="circulo"></div>
        </div>

        <div class="trem-item">
            <label for="tremB" class="trem-name">Senha:</label>
            <span class="trem-info">.........................</span>
        </div>

        <div class="trem-item">
            <label for="tremC" class="trem-name">Função:</label>
            <span class="trem-info">Funcionario</span>
        </div>

        <hr>

        <div class="trem-item">
            <label for="tremD" class="trem-name">EMAIL:</label>
            <span class="trem-info">cleitin_ferrolink@gmail.com</span>
        </div>

        <div class="trem-item">
            <label for="tremE" class="trem-name">📞 0800 654 7865</label>
            <span class="trem-info">Mais informações.</span>
        </div>

           <form action="../index.php" method="get" style="text-align:center;">
            <button type="submit" name="logout" value="1" class="logout-btn">Sair</button>
        </form>
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

