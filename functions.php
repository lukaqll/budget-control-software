<?php 

function formatPrice(float $vlprice=0.0)
{
	if ($vlprice > '') {
		
		$valor = number_format($vlprice, 2, ",", ".");

	}	elseif ($vlprice == 0 || $vlprice == NULL) {
		
		$valor = 0;
	}

	return $valor;
}

function getNomeDir($dir)
{
	$nomedir = substr($dir, 19);

	return $nomedir;
}

function formatDir($dir)
{
	$char=	['á', 'à', 'ã', 'â', 'é', 'è', 'ê', 'í', 'ì', 'ó', 'ò', 'õ', 'ô', 'ú', 'ù', 'û', 'ç'];
	$tochar=['a', 'a', 'a', 'a', 'e', 'e', 'e', 'i', 'i', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'c'];

	return str_replace($char, $tochar, $dir);
}

 ?>