<?php
require '../verifica_login.php';
require '../conexao.php';

$id = $_GET['id'];
$query = 'DELETE FROM "Usuario" WHERE id = $1';
pg_query_params($conn, $query, [$id]);

header("Location: index.php");
exit;
?>