<?php
include_once '../model/CheckingAccount.php';
include_once '../model/SavingsAccount.php';

// 1 - depósito de 100, na conta com saldo de 200 (conta corrente)
$deposit = new CheckingAccount(200);
echo $deposit->deposit(100);
print_r($deposit);

// 2 - depósito de 1000, na conta com saldo de 500 (conta poupança)
$deposit = new SavingsAccount(500);
echo $deposit->deposit(1000);
print_r($deposit);

// 3 - saque de 500, na conta com saldo de 1000(conta corrente)
$withdraw = new CheckingAccount(1000);
echo $withdraw->withdraw(500);
print_r($withdraw);

// 4 - saque de 400, na conta com saldo de 600(conta poupança)
$withdraw = new SavingsAccount(600);
echo $withdraw->withdraw(400);
print_r($withdraw);

// 5 - saque de 500, na conta com saldo de 1000(conta corrente) - Além do limite da cc
$withdraw = new CheckingAccount(1000);
echo $withdraw->withdraw(601);
print_r($withdraw);

// 6 - saque de 500, na conta com saldo de 1000(conta poupança) - Além do limite da cp
$withdraw = new SavingsAccount(2000);
echo $withdraw->withdraw(1001);
print_r($withdraw);

// 7 - saque de 500, na conta com saldo de 400(conta poupança) - Além do limite do saldo
$withdraw = new CheckingAccount(400);
echo $withdraw->withdraw(500);
print_r($withdraw);

// 8 - transferência de 550, de uma conta corrente para uma conta poupança
$transfer1 = new CheckingAccount(1000);
$transfer2 = new SavingsAccount(5000);
echo $transfer1->transfer(550, $transfer2);
print_r($transfer1);
print_r($transfer2);