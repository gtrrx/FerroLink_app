<?php

// 1) Conexão
$mysqli = new mysqli("localhost", "root", "root", "banco_sa");
if ($mysqli->connect_errno) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

session_start();

// 2) Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// 3) Login
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
        header("Location: public/menu.html");
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
    <h3>Login</h3>
    <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Usuário" required>
      <input type="password" name="password" placeholder="Senha" required>
      <button type="submit">Entrar</button>
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


<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="forms-login">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email">
            </div>


            <div class="input-group">
                <label for="password">Senha:</label>
                <input type="password" id="password">
            </div>
            <button type="submit" id="entrar" class="botao_entrar">Entrar</button>


        </form>
        <div class="forgot-password">
            <a href="Senha/senha.html">Esqueceu a senha?</a>
        </div>
        <br>
        <div class="forgot-adm">
            <a href="adm/login.html">Entrar como Administrador</a>
        </div>
    </div>


    <script src="script.js"></script>
</body>


</html>
