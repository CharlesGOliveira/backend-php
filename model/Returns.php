<?php
include_once '../model/CashMachine.php';

class Returns {

    /**
    * Função que retorna as mensagens das transações
    * 
    * @param int $messageCode Posição do array com a mensagem
    * @return string
    */
    public function getMessage(int $messageCode)
    {
        return self::MESSAGES[$messageCode] ?: self::MESSAGES['default'];
    }

    private const MESSAGES = [
        1 => 'Transação realizada com sucesso.',
        2 => 'Valor informado(mais taxas) é maior que o limite disponível para saque.',
        3 => 'Valor informado(mais taxas) é maior que o saldo disponível na conta.',
        4 => 'Valor informado maior que o saldo disponível na conta de origem',
        'default' => 'Não foi possível realizar a operação. Tente novamente mais tarde'
    ];
}