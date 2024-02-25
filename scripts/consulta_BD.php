<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "help_desk";

// Criar conexão
$conn = new mysqli(
  $servername, 
  $username, 
  $password, 
  $dbname
);

// Verificar conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Preparar a consulta SQL
$sql = "SELECT * FROM chamado";

// Executar a consulta e obter os resultados
$result = $conn->query($sql);

// Fechar a conexão
$conn->close();

return $result;
?>
