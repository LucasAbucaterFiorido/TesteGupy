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
            <label for="txtpalavra">Escreva uma palavra ?</label> <!-- titulo -->
            <br>
            <br>
            <input style='width: 80px;' type="text" id="txtpalavra" name="txtpalavra" required> <!-- onde o usuario insere o numero a ser consultado  -->
            <br>
            <br>
            <button type="submit">Inverter</button> <!-- Envia o formulario  -->
        </form>
    </fieldset>
    <?php

        //eco strrev ("Olá "); 

        if($_POST)  //verifica se há envios via metodo POST e se há aplicar ->
        {
            $palavra = $_POST['txtpalavra'];        //declaração de variavel
            $numLetras = strlen($palavra);      //aplica um metodo que conta a quantidade de caracteres de uma string
            $inverso = "";          //declaração de variavel
            //echo "Numero de letras: ".$numLetras."<hr>";   //linha para teste

            $i = $numLetras;  //declarando variavel
            for ($i--; $i > -1; $i--) //quantidade de letras - 1, pois para navegar pela string ela começa pelo começa pelo zero 
            { 
                //echo $palavra[$i];    //linha para teste
                $inverso = $inverso.$palavra[$i];   //escolhe qual caracter irá ser apresentado pelo numero contido na variavel '$i'
            }

            if($palavra)  //se a palavra a ser invertida existe, fazer->
            {
                // callback/resposta
                echo "
                    <br>
                    <fieldset style='width: 310px;text-align: center; margin: auto;'>
                        <br>
                        <label>String: ". $palavra."</label>
                        <br>
                        <label>Inverso: ". $inverso."</label>
                        <br><br>
                    </fieldset>
                ";
            }
        }
    ?>
</body>
</html>
