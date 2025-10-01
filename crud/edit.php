<?php
require '../verifica_login.php';
require '../conexao.php';

$id = $_GET['id'];
$query = 'SELECT * FROM "Usuario" WHERE id = $1';
$result = pg_query_params($conn, $query, [$id]);
$user = pg_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = !empty($_POST['email']) ? $_POST['email'] : $user['email'];
    $senha = !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : $user['senha'];

    $query = 'UPDATE "Usuario" SET nome = $1, email = $2, senha = $3 WHERE id = $4';
    pg_query_params($conn, $query, [$nome, $email, $senha, $id]);

    header("Location: index.php");
    exit;
}
?>
<link rel="stylesheet" href="../css/style.css">

<div class="container">
    <form method="post" class="edit-form">
        <h3>Editar Usuário</h3>

        <input type="text" name="nome" value="<?= htmlspecialchars($user['nome']) ?>" required>
        <input type="email" name="email" placeholder="Novo Email (opcional)" value="<?= htmlspecialchars($user['email']) ?>">
        <input type="password" name="senha" placeholder="Nova senha (opcional)">
        
        <button type="submit">Atualizar</button>
    </form>
</div>
