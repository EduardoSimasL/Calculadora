<?php

require_once __DIR__ . '/src/Usuario.php';
require_once __DIR__ . '/src/CalculadoraImc.php';
require_once __DIR__ . '/src/SexoEnum.php';
require_once __DIR__ . '/src/ClassificacaoImcEnum.php';

$usuario = new Usuario('Joao', new DateTimeImmutable('2000-01-01'), 150, 1.80, SexoEnum::M);
$calculadoraImc = new CalculadoraImc($usuario);
print_r(ClassificacaoImcEnum::classifica($calculadoraImc->calcular()));


