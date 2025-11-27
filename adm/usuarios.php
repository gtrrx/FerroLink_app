<?php
$mysqli = new mysqli("localhost", "root", "root", "banco_sa");
if ($mysqli->connect_errno) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT id_usuario, username, tipo_usuario, cargo, email FROM usuario";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários Cadastrados</title>
    <link rel="stylesheet" href="usuario.css">
</head>
<body>

<div class="container">

    <h2>Usuários Cadastrados</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Cargo</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>

        <?php while ($usuario = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $usuario['id_usuario'] ?></td>
            <td><?= $usuario['username'] ?></td>
            <td><?= $usuario['tipo_usuario'] ?></td>
            <td><?= $usuario['cargo'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td>
                <a class="btn-edit" href="editar.php?id=<?= $usuario['id_usuario'] ?>">✏ Editar</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <a href="cadastro.php" class="btn-voltar">Voltar</a>

</div>

</body>
</html>
