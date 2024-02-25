<?php
session_start();

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

$usuario_autenticado = false;

// Obter os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Preparar a consulta SQL
$sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";

// Criar uma declaração preparada
$stmt = $conn->prepare($sql);

// Vincular os parâmetros à declaração preparada
$stmt->bind_param("ss", $email, $senha);

// Executar a declaração preparada
$stmt->execute();

// Obter o resultado
$result = $stmt->get_result();

// Verificar se algum usuário foi encontrado
if ($result->num_rows > 0) {
  $usuario_autenticado = true;
}

if ($usuario_autenticado) {
  $_SESSION['autenticado'] = 'SIM';
  header('Location: ../home.php');
} else {
  $_SESSION['autenticado'] = 'NAO';
  header('Location: ../index.php?login=erro');
}

$stmt->close();
$conn->close();
