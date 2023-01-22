<?php
  require_once ('autenticador.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <title>Menu Help Desk</title>
  </head>
  <body>
    <header>
        <nav class="fixed-top navbar navbar-light bg-secondary">
        <a class="navbar-brand" href="menu.php">
            <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <span class="">App Help Desk</span>
        </a>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="logoff.php" class="nav-link">Sair</a>
          </li>
        </ul>
        </nav>
    </header>

    <div class="central card bg-light mb-3">
        <div class="card-header">Menu</div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 d-flex justify-content-center">
              <a href="abertura-chamado.php">
                  <img  src="images/formulario_abrir_chamado.png" width="100px" alt="">
              </a>
            </div>
            <div class = "col-6 d-flex justify-content-center">
              <a href="consulta-chamado.php">
                  <img src="images/formulario_consultar_chamado.png" width="100px" alt="">
              </a>
            </div>
          </div>
        </div>
    </div>


    

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>