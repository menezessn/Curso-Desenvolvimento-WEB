<?php
  require_once ('autenticador.php');
  $arquivo = fopen('arquivo.hd','r');
  $listaDados = [];

  while(!feof($arquivo)){
    $dados_arquivo = fgets($arquivo);
    $recuperaId = strstr($dados_arquivo, '#', true);
    if($_SESSION['perfil_id'] == 2){
      if($recuperaId != $_SESSION['id']) continue;
    }
    $listaDados[] = $dados_arquivo;
  }
  fclose($arquivo);
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
    <title>App Help Desk</title>
  </head>
  <body>
    <header>
        <nav class="fixed-top navbar navbar-light bg-secondary">
        <a class="navbar-brand" href="menu.php">
            <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <span class="">App Help Desk</span>
        </a>
        </nav>
    </header>

    <div class="central card bg-light" >
        <div class="card-header">Consulta de chamado</div>
        <div class="card-body">
        <?php
          foreach($listaDados as $registro){
            $chamadoDados = explode('#', $registro);
            
            if(count($chamadoDados)<4) continue;
        ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?=$chamadoDados[1]?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?=$chamadoDados[2]?></h6>
              <p class="card-text"><?=$chamadoDados[3]?></p>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
    </div>


    

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>