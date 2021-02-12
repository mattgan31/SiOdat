<?php

if (!function_exists('indonesian_currency')) {
    /**
     * Ubah angka menjadi format mata uang Indonesia
     *
     * @param [type] $value
     * @return void
     */
    function indonesian_currency($value)
    {
        return 'Rp' . number_format($value, 2, ',');
    }
}
