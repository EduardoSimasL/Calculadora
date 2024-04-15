<?php

// O IMC é calculado dividindo o peso (em kg) pela altura ao quadrado (em m), 
// de acordo com a seguinte fórmula: IMC = peso / (altura x altura).

/**
    IMC	Classificação
    Menor que 18,5	Magreza
    18,5 a 24,9	Normal
    25 a 29,9	Sobrepeso
    30 a 34,9	Obesidade grau I
    35 a 39,9	Obesidade grau II
    Maior que 40	Obesidade grau III
 */
class CalculadoraImc
{
    private Usuario $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }


    public function calcular(): float
    {
        return $this->usuario->getPeso() / ($this->usuario->getAltura() * $this->usuario->getAltura());
    }
}