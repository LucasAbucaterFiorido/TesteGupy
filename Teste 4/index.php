<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Teste 4</title>
</head>
<body style="background-color: #121212; color:aliceblue;">
<?php

        $spFat = 67836.43;   //fatura sao paulo
        $rjFat = 36678.66;   //fatura rio dejaneiro 
        $mgFat = 29229.88;   //fatura minas gerais
        $esFat = 27165.48;   //fatura espiruto santo
        $outrosFat = 19849.53; //fatura outros

        //Para fazer o cálculo da porcentagem, é preciso dividir um valor sobre o outro para que você saiba quanto de um valor representa em relação ao outro. 
        //Por exemplo, 15 representa 25% de 60, pois 15/60 = 0,25 (0,25 x 100 = 25%).

        $total = $spFat + $rjFat + $mgFat + $esFat + $outrosFat; //soma de todas as faturas
        

?>
<div class="container mt-4">
	<div class="row">
		<div class="col-12">
			<div class="container">
				<div class="row">
					<div class="col-12">
                    <table class="table table-dark table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="text-center ms-5" style="width: 50px;"><span>Sp</span></div>
                                </th>
                                <td>R$ <?= number_format($spFat, 2) ?></td>
                                <td class="text-center"><?= number_format(($spFat/$total)*100, 1); ?>%</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="text-center ms-5" style="width: 50px;">Rj</div>
                                </th>
                                <td>R$ <?= number_format($rjFat, 2) ?></td>
                                <td class="text-center"><?= number_format(($rjFat/$total)*100, 1); ?>%</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="text-center ms-5" style="width: 50px;">Mg</div>
                                </th>
                                <td>R$ <?= number_format($mgFat, 2) ?></td>
                                <td class="text-center"><?= number_format(($mgFat/$total)*100, 2) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="text-center ms-5" style="width: 50px;">Es</div>
                                </th>
                                <td>R$ <?= number_format($spFat, 2) ?></td>
                                <td class="text-center"><?= number_format(($esFat/$total)*100, 1); ?>%</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="text-center ms-5" style="width: 50px;">Outros</div>
                                </th>
                                <td>R$ <?= number_format($rjFat, 2) ?></td>
                                <td class="text-center"><?= number_format(($outrosFat/$total)*100, 1); ?>%</td>
                            </tr>
                            <tr id="table_divisor"> 
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="text-center ms-5" style="width: 50px;">Total</div>
                                </th>
                                <td>R$ <?= number_format($total, 2) ?></td>
                                <td class="text-center"><?= number_format(($total/$total)*100, 1) ?>%</td>
                            </tr>
                        </tbody>
                    </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<script src="../js/jquery-3.6.1.js"></script>
    


</body>
</html>