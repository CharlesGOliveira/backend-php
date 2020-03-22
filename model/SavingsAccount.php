<?php
include_once '../model/Account.php';


class SavingsAccount extends Account {

var $limit = 1000;
var $tax = 0.8;
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