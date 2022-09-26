<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste 1</title>
</head>
<body style="background-color: #121212; color:aliceblue;">
<?php
    $indice = 13; //declaração de variavel
    $soma = 0; //declaração de variavel
    $i = 0; //declaração de variavel

    //estrutura de repetição
    do //faça
    {
        $i ++;      //adcionar +1 a variavel $i
        $soma = $soma + $i;       //soma a variavel $i com a $soma
    }while ($i < $indice);      //imterrompe a estrutura de repetição quando $i for menor que a varivel $indice

    echo "
        <fieldset style='width: 300px;text-align: center; margin: auto;'>
        <label for='txtsoma'>Valor da variável soma: </label>
        <input style='color: aliceblue;' id='txtsoma' type='number' value='".$soma."' disabled>
        </fieldset>";
    //o valor será 91
?>

<a href="" style="text-align: center;"></a>

</body>
</html>