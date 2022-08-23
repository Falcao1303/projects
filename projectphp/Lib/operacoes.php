<?php


class Lib_Operacoes
{

    public function convertToMoney($value)
    {
        return 'R$ '.number_format($value, 2, ',', '.');
    }

    public function convertToFloat($value)
    {
        return floatval(str_replace('R$','',$value));
    }
}

