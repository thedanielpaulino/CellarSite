<?php
$user="postgres.cuxhepeccjvqegouysut"; 
$password="ne/d|z`!I0297?B";
$host="aws-0-sa-east-1.pooler.supabase.com";
$port="6543";
$dbname="postgres";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require");

if (!$conn) {
    die(" Erro na conexao com o banco de dados Supabase.");
}
?>





