<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.css">
    <title>Teste 3</title>
</head>
<body style="background-color: #121212; color:aliceblue;">
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<table class="table table-dark table-striped text-center">
							<thead>
								<tr>
									<th scope="col">
										<label for="">Mês</label>	<!-- O mes que é detalhado -->
									</th>
									<th scope="col">
										<label for="">Menor Valor diario</label> <!-- O menor valor de faturamento ocorrido em um dia do mês -->
									</th>
									<th scope="col">
										<label for="">Maior Valor diario</label> <!-- O maior valor de faturamento ocorrido em um dia do mês -->
									</th>
									<th scope="col">
										<label for="">Dias com valor maior que a média mensal</label> <!-- Número de dias no mês em que o valor de faturamento diário foi superior à média mensal -->
									</th>
								</tr>
							</thead>
							<tbody class='text-light'>
								<!-- Onde será criado as linhas de filtros do arquivo json -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<script src="../js/jquery-3.6.1.js"></script> <!-- biblioteca Jquery -->
	<script>
		//	INICIO carregando arquivo json
		//var requestURL = 'http://localhost/projetos/php/GitHub/TesteGupy/teste%203/json/faturamentoMensal.json';
		var request = new XMLHttpRequest();
		request.open('GET', 'http://localhost/projetos/php/GitHub/TesteGupy/teste%203/json/faturamentoMensal.json'); //requestURL
		request.responseType = 'json';
		request.send();
		//	FIM carregando arquivo json
		request.onload = function()
		{
			var arquivo = request.response; //declara a variavel/objeto "arquivo" como recptor do arquivo json
			//var teste = arquivo.faturamentos[0].faturamento[29].status
			//console.log(typeof fatMes);
			// var fatMes = arquivo.faturamentos[0];
			var meses = arquivo.faturamentos; //cria uma variavel para evitar percorrer caminhos longos pelo objeto

			indice = 0;	//declarando variavel

			do //faça
			{ 

				var i = 0;		//declarando variavel
				var valorMaior = 0;		//declarando variavel
				var valorMenor = 99999;		//declarando variavel 99999 pois a variavel será validada de maior para menor
				var valorTotal = 0;		//declarando variavel
				var media = 0;		//declarando variavel
				var fds = 0;		//declarando variavel

				do //faça²
				{
					var valorDia = meses[indice].faturamento[i].valor;	//declara valorDia com o valor diario do dia contido na variavel 'i'
					var statusDia = meses[indice].faturamento[i].status;	//declara statusDia com o status diario do dia contido na variavel 'i'
					i ++;	//apó a utilização do 'i' na declaração de variavel adcionar +1

					if(statusDia == "dia util")	//se for um dia util entao
					{
						if(valorMaior < valorDia)	//se a variavel auxiliar de maior valorDiario ter um valor menor que o valor diario atual entao 
						{
							valorMaior = valorDia;	//a variavel auxiliar de maior valorDiario obtem o mesmo valor diario atual
						}
						else if(valorMenor > valorDia)	//se a variavel auxiliar de menor valorDiario ter um valor maior que o valor diario atual entao 
						{
							valorMenor = valorDia;	//a variavel auxiliar de menor valorDiario obtem o mesmo valor diario atual
						}
						valorTotal = valorDia + valorTotal;		//a cada repetição todos os valores diarios sao somados e guardados na variavel 'valor total'			
					}
					else if(statusDia == "fim de semana") //se for um fim de semana entao
					{
						fds ++;	//a variavel adiciona +1 para a contagem
					}
				} while (i < meses[indice].faturamento.length);		//enquanto 'i' for menor que a quantidade de dias de 1 mês
				
				media = valorTotal / (meses[indice].faturamento.length - fds);		//algoritmo para calcular a media mensal de faturamento
				var i = 0;		//re-declaração de variavel
				var diaSupMedia = 0;	//declaração de variavel

				do //faça
				{
					var valorDia = meses[indice].faturamento[i].valor;	//declara valorDia com o valor diario do dia contido na variavel 'i'
					//console.log(valorDia);	//linha de teste
					i ++;	//apó a utilização do 'i' na declaração de variavel adcionar +1
					if(valorDia > media)	//se o valor diario atual for maior que a media então
					{
						diaSupMedia ++;		//a variavel adiciona +1 para a contagem
					}
				} while (i < meses[indice].faturamento.length);		//enquanto 'i' for menor que a quantidade de dias de 1 mês

				// INICIO criação e manipulação de DOM 
				var linha = $("<tr>")	//cria um linha de tabela
					.append("<th id='txtmes"+ indice +"' scope='row'>"+ meses[indice].mes +"</th>")	//cria uma coluna de titulo em uma linha de tabela, e nomeia com o nome do mes atual
					.append("<td>	<input id='txtmenor"+ indice +"' type='number' value='"+valorMenor+"' disabled>	</td>")	//cria uma coluna em uma linha de tabela, e cria um input e dar-lhe um Id e o valor diario menor mensal 
					.append("<td>	<input id='txtmaior"+ indice +"' type='number' value='"+valorMaior+"' disabled>	</td>")	//cria uma coluna em uma linha de tabela, e cria um input e dar-lhe um Id e o valor diario maior mensal
					.append("<td>	<input id='txtsuperiorMedia"+ indice +"' type='number' value='"+diaSupMedia+"' disabled>	</td>");	//cria uma coluna em uma linha de tabela, e cria um input e dar-lhe um Id e o quantidade de dias que tiveram seu valor diario maior que a media mensal
				// FIM criação e mani pulação de DOM 
				$("tbody").append(linha);	// aplica a criação/manipulaçao de DOM dentro da variavel "linha"
				$("input").addClass("text-white");	// deixa o texto na cor branca em todos os inputs

				indice ++;		//apó a utilização do 'i' na declaração de variavel adcionar +1

			} while (indice < meses.length);	//enquanto 'indice' for menor que a quantidade de meses
			//console.log(indice);		//linha de teste
		};
	</script>
</body>
</html>
