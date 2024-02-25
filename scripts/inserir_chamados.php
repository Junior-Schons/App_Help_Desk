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
    $dbname);

// Verificar conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Obter os dados do formulário
$titulo = $_POST['titulo'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];

// Preparar a consulta SQL
$sql = "INSERT INTO chamado (titulo, categoria, descricao) VALUES (?, ?, ?)";

// Criar uma declaração preparada
$stmt = $conn->prepare($sql);

// Vincular os parâmetros à declaração preparada
$stmt->bind_param("sss", $titulo, $categoria, $descricao);

// Executar a declaração preparada
if ($stmt->execute() === TRUE) {
  // Redirecionar para 'home.php'
  header('Location: ../home.php');
  exit;
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
