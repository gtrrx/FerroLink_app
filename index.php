<?php

$mysqli = new mysqli("localhost", "root", "root", "banco_sa");
if ($mysqli->connect_errno) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["username"] ?? "";
    $pass = $_POST["password"] ?? "";

    $stmt = $mysqli->prepare("SELECT id_usuario, username, senha FROM usuario WHERE username=? AND senha=?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados) {
        $_SESSION["user_id"] = $dados["id_usuario"];
        $_SESSION["username"] = $dados["username"];
        header("Location: public/menu.php");
        exit;
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}
?>

<?php if (!empty($_SESSION["user_id"])): ?>
  <div class="card">
    <h3>Bem-vindo, <?= $_SESSION["username"] ?>!</h3>
    <p>Sessão ativa.</p>
    <p><a href="?logout=1">Sair</a></p>
  </div>

<?php else: ?>
  <div class="card">
    <h2>Bem-Vindo</h2>
    <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
    <form method="post">
        <div class="loguim">
        <div class="user">
      <input type="text" name="username" placeholder="Usuário" required>
        </div>
        <div class="senh">
      <input type="password" name="password" placeholder="Senha" required>
      </div>
        </div>
      <button type="submit">Entrar</button>
      <br>
        <div class="forgot-adm">
            <a href="adm/login.php">Entrar como Admin</a>
        </div>
    </form>
    <p><small>Dica: Admin / admin123</small></p>
  </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

      <a href="get_messages.php">Ver Mensagens MQTT</a>
      <a href="test.php">test</a>



</html>