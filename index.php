<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = 'SELECT * FROM "Usuario" WHERE email = $1';
    $result = pg_query_params($conn, $query, [$email]);

    if ($row = pg_fetch_assoc($result)) {
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_email'] = $row['email'];
            header("Location: crud/index.php");
            exit;
        }
    }

    $erro = "Email ou senha inválidos.";
}
?>
<link rel="stylesheet" href="./css/style.css">

<div class="login-container">
    <form method="post" class="login-form">
        <h3> Bem-vindo de volta</h3>

        <input type="text" name="email" placeholder="Digite seu email" required>
        <input type="password" name="senha" placeholder="Digite sua senha" required>
        <button type="submit">Entrar</button>
        
        <?php if (isset($erro)) echo "<p class='erro'>$erro</p>"; ?>

    </form>
</div>
