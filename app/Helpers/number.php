<?php

/**
 * Set Numero
 *
 * Formatear un valor numérico.
 *
 * @param   string
 * @return  float
 */
if ( ! function_exists('setNumber'))
{
	function setNumber($valor)
	{
	  	$num = str_replace(",", "", $valor);

		return floatval($num);
	}
}