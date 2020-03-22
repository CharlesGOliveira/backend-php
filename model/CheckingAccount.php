<?php
include_once '../model/Account.php';

class CheckingAccount extends Account{

var $limit = 600;
var $tax = 2.5;
var $balance;

public function deposit($value)
{
    return CashMachine::deposit($value);
}

public function withdraw($value)
{
    return CashMachine::withdraw($value);
}

public function transfer($value, $balanceTo)
{
    return CashMachine::transfer($value, $balanceTo);
}
}