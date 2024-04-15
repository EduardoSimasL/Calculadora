<?php

require_once __DIR__ . '/src/Usuario.php';
require_once __DIR__ . '/src/CalculadoraImc.php';
require_once __DIR__ . '/src/SexoEnum.php';
require_once __DIR__ . '/src/ClassificacaoImcEnum.php';

try {
    if (empty($_POST['nome']) || empty($_POST['peso']) || empty($_POST['altura']) || empty($_POST['sexo']) || empty($_POST['data_nascimento'])) {
        throw new DadosUsuarioInvalidosException();
    }

    $usuario = new Usuario(
        nome: $_POST['nome'],
        peso: $_POST['peso'],
        altura: $_POST['altura'],
        sexo: SexoEnum::from($_POST['sexo']),
        dataNascimento: new DateTimeImmutable($_POST['data_nascimento'])
    );

    $calculadora = new CalculadoraImc($usuario);
    $resultado = ClassificacaoImcEnum::classifica($calculadora->calcular());

    $template = file_get_contents(__DIR__ . '/src/templates/resultado.html');

    $template = str_replace(
        [
            '{{USUARIO}}',
            '{{PESO}}',
            '{{ALTURA}}',
            '{{IDADE}}',
            '{{SEXO}}',
            '{{ICM}}',
            '{{CLASSIFICACAO}}'
        ],
        [
            $usuario->getNome(),
            $usuario->getPeso(),
            $usuario->getAltura(),
            $usuario->getIdadeAtual(),
            $usuario->getSexo()->value,
            $calculadora->calcular(),
            $resultado
        ],
        $template
    );

    echo $template;
} catch (DadosUsuarioInvalidosException $e) {
    echo 'Erro: Dados do usuário inválidos.';
    //Logar
    error_log('Erro: Dados do usuário inválidos.');
} catch (Exception $e) {
    echo 'Erro inesperado: ' . $e->getMessage();
    //Logar
    error_log('Erro inesperado: ' . $e->getMessage());
}
