
<?php 

use Hcode\Model\Product;
use Hcode\DB\Sql;


	function getpdf($cod)
	{
		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_products WHERE cod = :cod",
		[':cod'=>$cod]);

		return $result[0];

	}

	function listAllitens($cod)
	{

		$sql = new Sql();

		$results = $sql-> select("SELECT * FROM tb_itens WHERE cod = :cod ORDER BY iditem;",[':cod' => $cod]);

		return $results;

	}

	$result = getpdf($cod);

		$valor = formatPrice($result['price']);

		$data = strftime("%d de %B de %Y", strtotime('today'));

	$results = listAllitens($cod);

	$rows = (int)count($results);

	$baselink = "http://localhost:".$_SERVER['SERVER_PORT'];
	?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8">
<title>PDF - <?= $resp ?></title>
	
	<link rel="stylesheet" type="text/css" href="<?=$baselink?>/res/orc/bootstrap/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/b88754c2b4.js" crossorigin="anonymous"></script>

	<style type="text/css">
			@font-face {
			font-family: 'OpenSans';
			src: url("<?=$baselink?>/lib/fonts/OpenSans/OpenSans-Regular.ttf");
			font-size: 1em;
		}


		@page{
			margin: 70px 0;
		}

		body{
		
		}

		.container{
			width: 70%;
			margin:0 auto;
		}

		#logo {
			position: relative;
			margin-left: 10px;
			margin-top: 0px;
			width: 200px;
		}

		h1{
			font-family: 'OpenSans';
			font-weight: bold;
			color: black;
			font-size: 40px;
			position: relative;
			margin-left: 80px;
			top: -90px;
		}
		h2{
			font-family: 'OpenSans';
			color: black;
			font-size: 15px;
			position: relative;
			margin-left: 168px;
			font-weight: lighter;
			top: -90px;

		}

		.camp{
			border: none;
			font-family: 'OpenSans';
			margin-left: -10px;
			margin-top: -5px;
		}

		#cliente{
			border-right-color: black;
		}

		#itens{
			height: 250px;
		}

		p{
			margin-top: 0px;
		}

		label{
			font-family: Arial;
			font-weight: bolder;

		}

		#title{
			font-size: 15px;
		}

		.tab{
			border-radius: 0;
		}

		tr{
			font-size: 12px;
		}

	</style>


<body>

		<div class="container">
			
			<!-- <img src="<?=$baselink?>/lib/logo_nome.png" id="logo"> -->

		</div><br><br><br><br>
	
	<center><label class="container">Nota</label></center><br>

	<form class="container" method="POST">
	  <div class="form-group" id="cliente">
	  	 <input type="text" class="form-control camp" id="prazo" value="Cliente: <?=$result['vlprice'];?>">
	  </div>

		<table style="margin-left: -20px; width: 450px;">
			<thead >
			<tr style="background-color: rgb(225,225,255); border-radius:5px;  height: 25px; padding-left: 10px; margin-left: -30px">
				<th><label style="margin-left: 0px;">#</label></th>
				<th><label style="margin-left: 3px;">Ítem</label></th>
				<th><label style="margin-left: 0px">Qtd.</label></th>
				<th><label style="margin-left: 0px">Valor Un.</label></th>
				<th><label>Valor Total</label></th>
			</tr>
			</thead>

			<?php for ($i=0; $i < $rows; $i++): 

				(float)$valortotal = $results[$i]['qtd'] * $results[$i]['valor'];

				$formattotal = number_format($valortotal, 2, ",", ".");
				$formatitem = number_format($results[$i]['valor'], 2, ",", ".");
				?>	
			<tr>
				<td> <label style="margin-left: 0px; font-weight: lighter; font-family: OpenSans"><?= $results[$i]['iditem'] ?> </label></td>
				
				<td> <label style="margin-left: 3px; margin-right: -80px; width: 250px; font-weight: lighter; font-family: OpenSans"> <?= $results[$i]['item'] ?> </label></td>
				
				<td> <label style="margin-left: 0px; width: 30px;font-weight: lighter; font-family: OpenSans"><?= $results[$i]['qtd'] ?> </label></td>
				
				<td> <label style="margin-left: 0px; width: 40px;font-weight: lighter; font-family: OpenSans"><?= $formatitem ?> </label></td>

				<td> <label style="margin-left: 0px; width: 40px;font-weight: lighter; font-family: OpenSans"><?= $formattotal ?> </label></td>

			</tr>
			<?php endfor; ?>   
        </table>
 	
	  <br><br>

	  <label>Descrição:</label><br>
	  <textarea class="form-control" rows="3"><?= $result['desction']; ?></textarea>

	  <br><div class="form-group ">
	    <input type="text" class="form-control camp" id="valor" value="Valor Total: R$ <?=$valor?> ">
	  </div>
		<br><br>
	</form>

	<footer  style="position: absolute; bottom: 0">
	  <div  id="foot" class="container small float-botton">
	  	<p></p>
		<p>Imprimais Gráfica Rápida</p>
		<p>Lajinha - MG, <?=$data?></p>
		</div>
	</footer>

<script src="<?=$baselink?>/lib/jquery/jquery.min.js"></script>
<script src="<?=$baselink?>/lib/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>