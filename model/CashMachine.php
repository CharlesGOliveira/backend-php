<?php
include_once '../model/Transaction.php';
include_once '../model/CheckValue.php';
include_once '../model/Returns.php';

class CashMachine implements Transaction {

public function __GET($attribute)
{
    return $this->$attribute;
}

public function __SET($attribute, $value)
{
    $this->$attribute = $value;
}

/**
 * Função depósito que recebe o valor a ser depositado e acrescenta no saldo(balance) da conta.
 * 
 * @param float $value Valor que será depositado
 * @return string
 */
public function deposit($value)
{
    try{
        CheckValue::checkValue($value);
        $this->balance += $value;
        return Returns::getMessage(1);
    } catch (Exception $error){
        return $error;
    }
}

/**
 * Função de saque que recebe o valor a ser sacado.
 * O valor do saque é somado a taxa do tipo de conta(tax).
 * O resultado não deve ser maior que o saldo(balance) e limite(limit) da conta.
 * 
 * @param float $value Valor informado para saque
 * @return string
 */
public function withdraw($value)
{
    try{
        CheckValue::checkValue($value);
        
        $withdraw = $value + $this->tax;
        
        if($withdraw <= $this->balance && $withdraw <= $this->limit){
            $this->balance -= $withdraw;
            return Returns::getMessage(1);
        } elseif ($withdraw > $this->limit){
            return Returns::getMessage(2);
        } else{
            return Returns::getMessage(3);
        }
    } catch (Exception $error){
        return $error;
    }
}

/**
 * Função de transfêrencia que recebe o valor a ser transferido e a conta destinatária.
 * A conta de origem deve ter saldo(balance) maior ou igual ao valor da transfêrencia.
 * 
 * @param float $value Valor a ser transferido
 * @param Account $balanceTo Conta que receberá o valor
 * @return string
 */
public function transfer($value, $balanceTo) 
{
    try{
        CheckValue::checkValue($value);

        if($this->balance >= $value){
            $this->balance -= $value;
            $balanceTo->balance += $value;
            return Returns::getMessage(1);
        } else{
            return Returns::getMessage(4);
        }
    } catch(Exception $error){
        return $error;
    }
}
}