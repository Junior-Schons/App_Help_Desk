<?php
require_once './scripts/validator.php';

$result = include './scripts/consulta_BD.php';
?>

<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .card-consultar-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">
      <img src="./imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" href="./scripts/logoff.php">SAIR</a>
      </li>
    </ul>
  </nav>
  <div class="container">
    <div class="row">
      <div class="card-consultar-chamado">
        <div class="card">
          <div class="card-header">
            Consulta de chamado
          </div>

          <div class="card-body">
            <?php if ($result->num_rows > 0) : ?>
              <?php while ($chamado = $result->fetch_assoc()) : ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado['titulo'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado['categoria'] ?></h6>
                    <p class="card-text"><?= $chamado['descricao'] ?></p>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php else : ?>
              <p>Nenhum chamado encontrado</p>
            <?php endif; ?>

            <div class="row mt-4">
              <div class="col-6">
                <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>