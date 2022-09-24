<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste 2</title>
</head>
<body style="background-color: #121212; color:aliceblue;">
    <fieldset style='width: 310px;text-align: center; margin: auto;'>
        <form action="index.php" method="post"> <!-- envia o formulario pelo metodo POST para a pagina 'index.php'  -->
            <label for="txtnum">Este numero faz parte da sequencia de Fibonacci ?</label> <!-- titulo/questionamento  -->
            <br>
            <br>
            <input style='width: 80px;' type="number" id="txtnum" name="txtnum" required> <!-- onde o usuario insere o numero a ser consultado  -->
            <br>
            <br>
            <button type="submit">Consultar</button> <!-- Envia o formulario  -->
        </form>
    </fieldset>
    <?php
        if($_POST)  //verifica se há envios via metodo POST e se há aplicar ->
        {
            $consulta = $_POST['txtnum']; //declaração de variavel
            $num1 = 0;                  //declaração de variavel
            $num2 = 1;                  //declaração de variavel
            $auxiliar = 0;              //declaração de variavel

            if($consulta == 0)  //se o numero a ser consultado for igual a zero, fazer->
            {
                // callback/resposta
                echo "
                    <br>
                    <fieldset style='width: 310px;text-align: center; margin: auto;'>
                        <br>
                        <label>O numero ".$consulta." faz parte da sequencia de Fibonacci</label>
                        <br><br>
                    </fieldset>
                ";
            }
            else //se o numero a ser consultado não for igual a zero, fazer->
            {
                do //faça
                {
                    $auxiliar = $num1 + $num2;      //soma as variaveis $num1 e $num2 e adciona o resultado na $auxiliar
                    $num1 = $num2;                  //adiciona o valor da variavel $num2 na $num1
                    $num2 = $auxiliar;              //adiciona o valor da variavel $auxiliar na $num2
                }while ($consulta > $auxiliar); //interrompe a estrutura de repetição quando $consulta for menor que a variavel $auxiliar
                
                if($consulta == $auxiliar)  //se o numero a ser consultado for igual a variavel $auxiliar, fazer->
                {
                    // callback/resposta
                    echo "
                        <br>
                        <fieldset style='width: 310px;text-align: center; margin: auto;'>
                            <br>
                            <label>O numero ".$consulta." faz parte da sequencia de Fibonacci</label>
                            <br><br>
                        </fieldset>
                    ";
                }
                elseif($consulta != $auxiliar)  //se o numero a ser consultado não for igual a variavel $auxiliar, fazer->
                {
                    // callback/resposta
                    echo "
                        <br>
                        <fieldset style='width: 310px;text-align: center; margin: auto;'>
                            <br>
                            <label>O numero ".$consulta." não faz parte da sequencia de Fibonacci</label>
                            <br><br>
                        </fieldset>
                    ";
                }
                else    //erro
                {
                    echo "Erro!";   //erro
                }
            }
        }
    ?>
</body>
</html>
