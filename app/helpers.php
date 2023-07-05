<?php

if (!function_exists('format_decimal')) {

    function format_decimal($money, $decimal = 0)
    {
        return number_format($money, $decimal, ',' , '.');
    }

}
