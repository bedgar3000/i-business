<?php

/**
 * Formatear una fecha.
 *
 * @param  String
 * @param  String
 * @param  String
 * @return String
 */
if ( ! function_exists('formatDate'))
{
    function formatDate($fecha, $formatoInput='d-m-Y', $formatoOutput='Y-m-d')
    {
        if ($fecha && validateFecha($fecha, $formatoInput)) return \Datetime::createFromFormat($formatoInput, $fecha)->format($formatoOutput);
        else return '';
    }
}

/**
 * Validar una fecha.
 *
 * @param  String
 * @param  String
 * @return Boolean
 */
if ( ! function_exists('validateFecha'))
{
    function validateFecha($fecha, $formato = 'Y-m-d H:i:s') {
        $d = \Datetime::createFromFormat($formato, $fecha);
        return $d && $d->format($formato) == $fecha;
    }
}