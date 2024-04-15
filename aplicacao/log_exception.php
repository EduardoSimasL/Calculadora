<?php

require_once __DIR__ . '/src/Usuario.php';
require_once __DIR__ . '/src/CalculadoraImc.php';
require_once __DIR__ . '/src/SexoEnum.php';
require_once __DIR__ . '/src/ClassificacaoImcEnum.php';
require_once __DIR__ . '/src/ExemploException.php';

try {
    $usuario = new Usuario('Joao', new DateTimeImmutable('2000-01-01'), 150, 1.80, SexoEnum::M);
    print_r($usuario->fazAniversarioHoje(new DateTime('2000-01-01')));
} catch (ExemploException $e) {
    //throw $th;
} catch (\Throwable $th) {
    //throw $th;
}

// $usuario = new Usuario('Joao', new DateTimeImmutable('2000-01-01'), 150, 1.80, SexoEnum::M);
// $usuario->fazAniversarioHoje('2000-01-01');