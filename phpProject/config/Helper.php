<?php

function formatDecimal($value)
{
    return number_format($value, 2, ',', '.'); 
}

function formatCurrency($value)
{
    return str_replace(',', '.', str_replace('.', '', $value));

}