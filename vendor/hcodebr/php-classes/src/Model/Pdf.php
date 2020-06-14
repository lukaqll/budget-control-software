<?php 

namespace Hcode\Model;

use Hcode\Model\Product;
use Hcode\DB\Sql;


class Pdf
{
	public static function getpdf($ID)
	{
		$ID = "68";

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct",
		[':idproduct'=>$ID]);

		return $result[0];

	}

}


	$result = Pdf::getpdf("68");

		$solic = $result['vlprice'];
		$resp = $result['desproduct'];
		$itens = $result['desction'];
		$valor = $result['price'];
		$prazo = $result['vlweight'];
		$data = date("d-m-Y");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>PDF</title>
	
	<link rel="stylesheet" type="text/css" href="http://www.orcamento.com.br/views/lib/bootstrap/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/b88754c2b4.js" crossorigin="anonymous"></script>

	<style type="text/css">
				@font-face {
			font-family: 'OpenSans';
			src: url("fonts/OpenSans/OpenSans.ttf");
			font-size: 1em;
		}

		@page{
			margin: 70px 0;
		}

		body{
			font-family: arial;

		}

		.container{
			width: 60%;
			margin:0 auto;
		}

		header #logo {
			position: relative;
			margin-left: 40px;
			top: 31px;
			width: 64px;
		}

		header h1{
			color: black;
			font-size: 40px;
			position: relative;
			margin-left: 110px;
			font-weight: bold ;
			top: -31px;

		}
		header h2{
			color: black;
			font-size: 15px;
			position: relative;
			margin-left: 168px;
			font-weight: lighter;
			top: -47px;

		}

		.camp{
			border: none;
			font-weight: bold;
		}

		#cliente{
			border-right-color: black;
		}
	</style>


<body>

	<header>
		<div class="container">
			
			<img src="http://www.orcamento.com.br/views/lib/css/imprimais.logo.png" id="logo">
			<h1>Imprimais</h1>
			<h2>comunicação visual</h2>

		</div>
	</header>

	<center><label class="container"><strong>Orçamento</strong></label></center><br><br>

	<p class="container">Estamos encaminhando a V.Sª orçamento para confecção dos serviços abaixo:</p><br><br>

	<form class="container" method="POST">
	  <div class="form-group" id="cliente">
	  	 <input type="text" class="form-control camp" id="prazo" value="Cliente: <?= $resp ?> - <?=$solic?>">
	  </div><br>

	  <div class="form-group">
	    <label for="itens"><strong>Ítens</strong></label>
	    <textarea  id="itens" class="form-control"><?= $itens ?></textarea>
	  </div><br>

	  <div class="form-group ">
	    <input type="text" class="form-control camp" id="valor" value="Valor Total R$ <?=$valor?> ">
	  </div>

	   <div class="form-group ">
	    <input type="text" class="form-control camp" id="prazo" value="prazo de entrega: <?=$prazo?>">
	  </div>

	  <div class="form-group ">
	    <input type="text" class="form-control camp" id="data" value="Itabatã, <?=$data?>">
	  </div><br>

	</form>

	<div id="foot" class="container small">
	<p>Imprimais Comunicação Visual</p>
	<p>Av. Espírito Santo, 1.201 - Centro</p>
	<p>Itabatã - Mucuri - BA</p>
	<p>CEP: 459636-000</p>
	</div>

<script src="http://www.orcamento.com.br/views/lib/jquery/jquery.min.js"></script>
<script src="http://www.orcamento.com.br/views/lib/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
