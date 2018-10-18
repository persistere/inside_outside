<?php
/*Serão 2 Formas***************************************************
1) Se LatA longA for igual a LatB LongB envia um E-mail
--------------------------------------------------------------------
2) Se o celular estiver Fora da cerca avisa
*******************************************************************/
$lat_atual      	  = -23.61575;
$long_atual     	  = -46.690000;

//Query Consulta Cerca
//Descricao Ponto
//Categoria
$status 			  = 'f'; //dentro ou fora d ou f
$distancia_delimitada = 0.800; //Exemplo a 100m a 5KM ou 100mt
$lat_delimitada 	  = -23.693853;
$long_delimitada	  = -46.690000;
$data 				  = date('d/m/Y').'<br />';

//----------------------------------------------------------------------------------------
//Calculo distancia entre pontos
//----------------------------------------------------------------------------------------
$latA  = $lat_delimitada*(M_PI/180);
$longA = $long_delimitada*(M_PI/180); // M_PI is a php constant

$latB  = $lat_atual*(M_PI/180);
$longB = $long_atual*(M_PI/180);

$subBA    = bcsub ($longB, $longA, 20);
$cosLatA  = cos($latA);
$cosLatB  = cos($latB);
$sinLatA  = sin($latA);
$sinLatB  = sin($latB);

$distance = 6371*acos($cosLatA*$cosLatB*cos($subBA)+$sinLatA*$sinLatB);
$distacia_atual = round($distance, 3);
//$distance = 6371*acos(cos($latA)*cos($latB)*cos($longB-$longA)+sin($latA)*sin($latB));
//----------------------------------------------------------------------------------------
//FIM Calculo distancia entre pontos
//----------------------------------------------------------------------------------------



if ($distacia_atual >= $distancia_delimitada) {
	//Dentro
	$dentro_ou_fora = 'd';
	echo "Dentro";
}else{
	//Fora
	$dentro_ou_fora = 'f';
	echo "Fora";
}

if($data){
	if($dentro_ou_fora != $status ){//se for diferente do atual
		echo " update tabela ";
		echo $dentro_ou_fora;
	}
}