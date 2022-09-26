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
										<label for="">Mês</label>
									</th>
									<th scope="col">
										<label for="">Menor Valor diario</label> <!-- O menor valor de faturamento ocorrido em um dia do mês -->
									</th>
									<th scope="col">
										<label for="">Maior Valor diario</label> <!-- O maior valor de faturamento ocorrido em um dia do mês -->
									</th>
									<th scope="col">
										<label for="">Dias com valor maior q/média mensal</label> <!-- Número de dias no mês em que o valor de faturamento diário foi superior à média mensal -->
									</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
			//var teste = arquivo.faturamentos[0].faturamento[29].status
			//console.log(typeof fatMes);
			var fatMes = arquivo.faturamentos[0];
			var meses = arquivo.faturamentos;

			indice = 0;

			do {

				var i = 0;
				var valorMaior = 0;
				var valorMenor = 99999;
				var valorTotal = 0;
				var media = 0;
				var fds = 0;

				do 
				{
					var valorDia = meses[indice].faturamento[i].valor;
					var statusDia = meses[indice].faturamento[i].status;
					i ++;

					if(statusDia == "dia util")
					{
						if(valorMaior < valorDia)
						{
							valorMaior = valorDia;
						}
						else if(valorMenor > valorDia)
						{
							valorMenor = valorDia;
						}
						valorTotal = valorDia + valorTotal;					
					}
					else if(statusDia == "fim de semana") 
					{
						fds ++;
					}
				} while (i < meses[indice].faturamento.length);
				
				media = valorTotal / (meses[indice].faturamento.length - fds);
				var i = 0;
				var diaSupMedia = 0;

				do 
				{
					var valorDia = meses[indice].faturamento[i].valor;
					console.log(valorDia);
					i ++;
					if(valorDia > media)
					{
						diaSupMedia ++;
					}
				} while (i < meses[indice].faturamento.length);

				var tr = $("<tr>")
					.append("<th id='txtmes"+ indice +"' scope='row'>"+ meses[indice].mes +"</th>")
					.append("<td>	<input id='txtmenor"+ indice +"' type='number' value='"+valorMenor+"'>	</td>")
					.append("<td>	<input id='txtmaior"+ indice +"' type='number' value='"+valorMaior+"'>	</td>")
					.append("<td>	<input id='txtsuperiorMedia"+ indice +"' type='number' value='"+diaSupMedia+"'>	</td>");
				$("tbody").append(tr);

				indice ++;

			} while (indice < meses.length);
			//console.log(indice);
		};
	</script>
</body>
</html>
