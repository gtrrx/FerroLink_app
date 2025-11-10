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

// EXCLUIR USUÁRIO
if (isset($_GET['delete'])) {
    $id_delete = intval($_GET['delete']);
    $stmt = $mysqli->prepare("DELETE FROM usuario WHERE id_usuario=?");
    $stmt->bind_param("i", $id_delete);

    if ($stmt->execute()) {
        header("Location: usuarios.php?msg=excluido");
        exit;
    }
}

// ATUALIZAR USUÁRIO
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_usuario'])) {
    $id = intval($_POST['id_usuario']);
    $username = $_POST['username'];
    $tipo = $_POST['tipo_usuario'];
    $cargo = $_POST['cargo'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    $stmt = $mysqli->prepare("UPDATE usuario SET username=?, tipo_usuario=?, cargo=?, senha=?, email=? WHERE id_usuario=?");
    $stmt->bind_param("sssssi", $username, $tipo, $cargo, $senha, $email, $id);

    if ($stmt->execute()) {
        header("Location: usuarios.php?msg=editado");
        exit;
    }
}

// BUSCAR USUÁRIO PARA EDITAR
if (!isset($_GET['id'])) {
    header("Location: usuarios.php");
    exit;
}

$id = intval($_GET['id']);
$stmt = $mysqli->prepare("SELECT * FROM usuario WHERE id_usuario=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$usuario = $stmt->get_result()->fetch_assoc();

if (!$usuario) {
    echo "Usuário não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="info-container">
<h2>Editar Usuário (ID <?= $usuario['id_usuario'] ?>)</h2>

<form method="POST">
    <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">

    <label>Nome:</label>
    <input type="text" name="username" value="<?= htmlspecialchars($usuario['username']) ?>" required>

    <label>Tipo:</label>
    <input type="text" name="tipo_usuario" value="<?= htmlspecialchars($usuario['tipo_usuario']) ?>" required>

    <label>Cargo:</label>
    <input type="text" name="cargo" value="<?= htmlspecialchars($usuario['cargo']) ?>" required>

    <label>Senha:</label>
    <input type="text" name="senha" value="<?= htmlspecialchars($usuario['senha']) ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>

    <button type="submit" class="btn-save">💾 Salvar Alterações</button>
</form>

<br>

<a class="btn-delete" href="editar.php?delete=<?= $usuario['id_usuario'] ?>" 
   onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
   🗑 Excluir Usuário
</a>

<br><br>
<a href="usuarios.php" class="menu-item">⬅ Voltar</a>

</div>

</body>
</html>
