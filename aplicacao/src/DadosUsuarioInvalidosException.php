<?php

class DadosUsuarioInvalidosException extends Exception
{
    public function __construct(string $message = 'Dados do usuário inválidos.', int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
