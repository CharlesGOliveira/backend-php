<?php
include_once '../model/CashMachine.php';

abstract class Account extends CashMachine{

    public function __construct($balance)
    {
        $this->balance = $balance;
    }
}