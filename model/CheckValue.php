<?php
include_once '../model/CashMachine.php';

class CheckValue {

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Função que verifica o valor informado.
     * 
     * @param float $value Valor informado
     * @return bool|string|int
     */
    public static function checkValue($value)
    {
        if(!is_numeric($value) || $value <= 0){
            throw new Exception("Valor informado inválido");
        }
    }
}