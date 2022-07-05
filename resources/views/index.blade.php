<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <nav class="navbar" style="background-color:red;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="img/pokebola.png" alt="" width="40" height="40">
      </a>

      <form class="d-flex" role="search" method="get" action="pesquisa">
        <input class="form-control me-2" type="text" id="key" name="key">
        <button class="btn btn btn-light" type="submit" placeholder="Faça a busca aqui por algum pokemon">Buscar</button>
      </form>

    </div>
  </nav>
  <div style="margin-top:30px;">
    <center>
      <h2> Poke API </h2>
    </center>
  </div>
  <br>
  <div class="pokedex">
    <center>
      <h3> Pokedex</h3>
    </center>
    <br>
    <div class="container">
      <div class="row">
        <?php
        for ($i = 0; $i < 150; $i++) {
          $nome = $json->results[$i]->name;
          $poekemon = curl_init("https://pokeapi.co/api/v2/pokemon/$nome");
          curl_setopt($poekemon, CURLOPT_RETURNTRANSFER, true);
          $resposta = curl_exec($poekemon);
          curl_close($poekemon);
          if ($teste = json_decode($resposta))
            $image = $teste->sprites->other->dream_world->front_default;
        ?>
          <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
              <a href="pokemon/<?php echo $nome?>"> <img class="card-img-top figure-img img-fluid rounded" style="width: 500px; height: 400px;" src="<?php echo $image ?>"> </a>
              <div class="card-body">
                <center>
                  <h2 class="card-text"><?= $nome ?></h2>
                </center>
                <br>
                <center>
                  <?php
                  foreach ($teste->types as $k => $v) {
                    echo $v->type->name . '&nbsp';
                  }
                  ?>
                </center>
                <br>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>