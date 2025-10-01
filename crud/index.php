<link rel="stylesheet" href="../css/style.css">
<div class="container">
<?php
require '../verifica_login.php';
require '../conexao.php';

$result = pg_query($conn, 'SELECT * FROM "Usuario" ORDER BY id');

echo "<p><a href='insert.php'>Novo usuário</a> | <a href='../logout.php'>Sair</a></p>";
echo "<table><tr><th>ID</th><th>Nome</th><th>Ações</th></tr>";

while ($row = pg_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nome']}</td>
        <td>
            <a href='edit.php?id={$row['id']}'>Editar</a> |
            <a href='delete.php?id={$row['id']}'>Excluir</a>
        </td>
    </tr>";
}
echo "</table>";
?>
</div>
