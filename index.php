<?php

require __DIR__.'/vendor/autoload.php';

use \App\WebService\Cnpj;

$obCNPJ = new Cnpj;

// Consulta o CNPJ informado.
$resultado = $obCNPJ->consultarCNPJ('00000000000191');

if(empty($resultado)){
    die('Problemas ao consultar');
}

// Verificando o erro da requisição.
if(isset($resultado['error'])){
    die($resultado['error']);
}
print_r($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <!--Fonte para o Body e Resultado-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,500;1,300;1,500&display=swap" rel="stylesheet">
    <title>Consulta CNPJ</title>
</head>
<body>

    <div class="first-div">
        <div class="content-div">
            <div class="title">
                <h1>Consultar CNPJ.</h1>
            </div>
            <div class="input-cnpj">
                <label for="#">Digite o CNPJ:</label>
                <input type="text">
            </div>
            <div class="result-cnpj">
            <table>
                <tr>
                    <th>Nome Fantasia:</th>
                    <td><?= $resultado['NOME FANTASIA'] ?></td>
                </tr>
                <tr>
                    <th>Razao Social:</th>
                    <td><?= $resultado['RAZAO SOCIAL'] ?></td>
                </tr>
                <tr>
                    <th>Telephone:</th>
                    <td>555 77 855</td>
                </tr>
            </table>

            </div>
        </div>
        
    </div>
    
</body>
</html>
