<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste 3</title>
</head>
<body style="background-color: #121212; color:aliceblue;">
    <fieldset style='width: 310px;text-align: center; margin: auto;'>
		<br>
		<label for="" id="txtmenor"></label> <!-- O menor valor de faturamento ocorrido em um dia do mês -->
		<label for="" id="txtmaior"></label> <!-- O maior valor de faturamento ocorrido em um dia do mês -->
		<label for="" id="txtsuperiorMedia"></label> <!-- Número de dias no mês em que o valor de faturamento diário foi superior à média mensal -->
		<br><br>
    </fieldset>

	<script src="../js/jquery-3.6.1.js"></script>
	<script>
		//var requestURL = 'http://localhost/projetos/php/GitHub/TesteGupy/teste%203/json/faturamentoMensal.json';
		var request = new XMLHttpRequest();
		request.open('GET', 'http://localhost/projetos/php/GitHub/TesteGupy/teste%203/json/faturamentoMensal.json'); //requestURL
		request.responseType = 'json';
		request.send();
		request.onload = function()
		{
			var arquivo = request.response;

			//var teste = JSON.parse(arquivo);
			//var teste2 = JSON.html(arquivo)
			var teste = arquivo.faturamentos[0].faturamento[29].status
			var fatMes = arquivo.faturamentos[0];

			//const dadosJSON = JSON.stringify(fatMes);
			//console.log(typeof fatMes);
			//console.log(fatMes.faturamento.length);

			var menor = $('#txtmenor');
			var maior = $('#txtmaior');
			var supMedia = $('#txtsuperiorMedia');

			var i = 0;
			var diaSupMedia = 0;

			do {
				console.log();
			} while (i < fatMes.faturamento.length);











			// var i = 0;
			// var valorMaior = 0;
			// var valorMenor = 1000;
			// var media = 0;
			// var auxiliar = 0;
			// var fds = 0;

			// do 
			// {
			// 	valorDia = fatMes.faturamento[i].valor;
			// 	statusDia = fatMes.faturamento[i].status;

			// 	if(statusDia == "fim de semana")
			// 	{
			// 		fds ++;
			// 	}
			// 	else if(statusDia == "dia util")
			// 	{
			// 		if(valorMaior < valorDia)
			// 		{
			// 			valorMaior = valorDia;
			// 		}
			// 		else if(valorMenor > valorDia)
			// 		{
			// 			valorMenor = valorDia;
			// 		}
			// 	}
				
				//console.log(fatMes.faturamento[i]);

			// 	auxiliar = auxiliar + valorDia;

			// 	i++;
			// } while (i < fatMes.faturamento.length);
			
			// media= auxiliar/(fatMes.faturamento.length - fds);
			// console.log(fatMes.faturamento.length);
			// console.log(auxiliar);
			// console.log(media);

			// menor.html(valorMenor);
			// maior.html(valorMaior);
			// supMedia.html(media);
		};
	</script>
</body>
</html>
