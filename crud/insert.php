<?php
require '../verifica_login.php';
require '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $query = 'INSERT INTO "Usuario"(nome, email, senha) VALUES ($1, $2, $3)';
    pg_query_params($conn, $query, [$nome, $email, $senha]);

    header("Location: index.php");
    exit;
}
?>
<link rel="stylesheet" href="../css/style.css">
<form method="post">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Cadastrar</button>
</form>