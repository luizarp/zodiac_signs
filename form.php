<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YourZodiac</title>
  <style>
    #content .row, #result {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    #content .col-10 {
      display: flex;
      flex-direction: column;
    }

    #content h1 {
      color: darkcyan;
    }

    #content label {
      font-size: 12px;
      margin-bottom: 2px;
      font-weight: bolder;
      font-family: Verdana, sans-serif;
      color: darkslateblue;
    }

    #content .col-10 input {
      width: 300px
    }

    #content button {
      margin-top: 15px;
      font-size: 12px;
      background-color: darkslateblue;
      color: white;
      border: none;
      padding: 5px 20px;
    } 
    #result h1 {
      color: darkmagenta;
      margin: 0;
    }

    #result h6 {
      margin: 2px 0 0 0;
    }

    #result p {
      margin: 15px 0 0 0;
      font-size: 14px;
      font-family: Verdana, sans-serif;
      text-align: center
    }
  </style>
</head>

<body>
  <div id="content">
    <form method="post">
      <div class="row">
        <h1>Descubra seu signo do zodíaco</h1>
        <div class="col-10">
          <label for="birthdate">Data de nascimento:</label>
          <input type="date" name="birthdate" id="birthdate" required />
        </div>
        <div class="col-3">
          <button type="submit">BUSCAR</button>
        </div>
      </div>
    </form>
    <div class="row">
      <hr style="width:500px;margin: 20px">
    </div>
    <div id="result">
      <div class="row" style="max-width:800px">
        <?php
          if(isset($_POST['birthdate'])){
            $date = new DateTime($_POST['birthdate']);
            $data_signo = $date->format('m-d');
            $xml = simplexml_load_file('zodiac.xml');
            foreach($xml->signo as $registro):
              if($data_signo >= $registro->data_inicio and $data_signo <= $registro->data_fim) {
                  echo '<h1>' . $registro->name_signo . '</h1>';
                  echo '<h6> De ' . $registro->data_inicio . ' até ' . $registro->data_fim . '</h6>';
                  echo '<p class="my-3">' .  $registro->descricao . '<p>';
                }
            endforeach;
          }
        ?>
      </div>
    </div>
  </div>
</body>

</html>