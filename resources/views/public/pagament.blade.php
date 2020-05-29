@extends('layouts.master')

@section('content')

    <h2>{{$pagament->titol}}</h2>
    <?php
      echo $pagament->descripcio;
    ?>
    <a class="button-style" href="javascript: void(0)" onclick="document.getElementById('form_{{$pagament->id}}').submit();">Fer el pagament</a>
    <?php
	$merchant_order = date('ymdHis'); //Fecha actual. No cambia para vosotros
	$cadena_json = '{"DS_MERCHANT_AMOUNT":"' . ($pagament->import * 100) . '","DS_MERCHANT_ORDER":"' . $merchant_order . '","DS_MERCHANT_MERCHANTCODE":"' .  $compte->fuc . '","DS_MERCHANT_CURRENCY":"978","DS_MERCHANT_TRANSACTIONTYPE":"0","DS_MERCHANT_TERMINAL":"1","DS_MERCHANT_MERCHANTURL":"https://pagaments.inscamidemar.cat/index.php/resultat","DS_MERCHANT_CONSUMERLANGUAGE":"3"}'; //Aquí tenéis el preu que es lo que se va a pagar por la excursión. Tabla pagaments y fuc que es el campo de la tabla COMPTE. La URL que deberéis poner para que vuelva
	$cadena_jason_base64 = base64_encode($cadena_json);
	// Creem la signatura
	$clau_decodificada = base64_decode($compte->clau); //-> clau es el campo de la tabla compte
	$bytes = array(0,0,0,0,0,0,0,0);
	$iv = implode(array_map("chr", $bytes));
	$ciphertext = mcrypt_encrypt(MCRYPT_3DES, $clau_decodificada, $merchant_order, MCRYPT_MODE_CBC, $iv);
	$res = hash_hmac('sha256', $cadena_jason_base64, $ciphertext, true);
	$res_base64 = base64_encode($res);
	?>
	<form action="https://sis.sermepa.es/sis/realizarPago" method="post" accept-charset="utf-8" id="form_{{$pagament->id}}">
	    <input type="hidden" name="Ds_SignatureVersion" value="HMAC_SHA256_V1" />
	    <input type="hidden" name="Ds_MerchantParameters" value="{{$cadena_jason_base64}}" />
	    <input type="hidden" name="Ds_Signature" value="{{$res_base64}}" />
	</form>

@endsection