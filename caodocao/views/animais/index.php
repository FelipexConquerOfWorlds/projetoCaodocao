<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body class="bg-warning border">
  <div class="p-0 bg-warning w-100">
    <div class="container">
        <a href="?acao=inserir">Inserir Novo Animal</a>

        <?php foreach ($animais as $animal): ?>
            <tr>
                <td><?= $animal->getCodAnimal() ?></td>
                <td><a href="?acao=exibir&cod=<?= $animal->getCodAnimal() ?>"><?= $animal->getNome() ?></a> </td>
                <td><?= $animal->getCodEspecie() ?></td>
            </tr>
        <?php endforeach; ?>






      <div class="row h-100 w-100 mx-5 px-1">
        <div class="col-4 col-sm-6 col-md-6 col-lg-7 col-xl-7 bg-dark border border-dark w-50 h-100 m-1">
          <div class="card bg-dark">
            <img class="card-img-top p-4" src="img/portfolio/placeholder-2.png" alt="Card image cap">
            <div class="card-body bg-dark w-100 p-0">
              <h5 class="card-title">Nome: Bob</h5>
              <h5 class="card-title">Raça: Cachorro</h5>
              <h5 class="card-title">Idade: 3 meses</h5>
              <h5 class="card-title">Sexo: Masculino</h5>
              <h1>Sou muito lindo e por isso mereço ser adotado.</h1>
              <h5 class="card-title">Dono: Joalmir</h5>
              <a href="#" class="btn btn-warning btn-lg ">conversar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
</body>

</html>