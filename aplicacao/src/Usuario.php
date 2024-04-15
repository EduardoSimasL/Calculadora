<?php

class Usuario
{
    private string $nome;
    private DateTimeInterface $dataNascimento;
    private float $peso;
    private float $altura;
    private SexoEnum $sexo;

    public function __construct(string $nome, 
                                DateTimeInterface $dataNascimento, 
                                float $peso, 
                                float $altura, 
                                SexoEnum $sexo)
    {
        $this->nome = $nome;
        $this->dataNascimento = $dataNascimento;
        $this->peso = $peso;
        $this->altura = $altura;
        $this->sexo = $sexo;
    }   


    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDataNascimento(): DateTimeInterface
    {
        return $this->dataNascimento;
    }

    public function getPeso(): float
    {
        return $this->peso;
    }

    public function getAltura(): float
    {
        return $this->altura;
    }

    public function getSexo(): SexoEnum
    {
        return $this->sexo;
    }


    public function getIdadeAtual()
    {
        return $this->dataNascimento->diff(new DateTimeImmutable(date('Y-m-d')))->y;
    }

    // public function fazAniversarioHoje(string | DateTime $dataAtual) : bool
    // {
    //     try {
    //         if ($dataAtual->diff(new DateTimeImmutable(date('Y-m-d')))) {
    //             return true;
    //         }
    //         return false;
    //     } catch (ExemploException $e) {
    //         print_r(['dentro da classe usuario linha 64' => $e]);
    //     } catch (Exception $e) {
    //         print_r(['dentro da classe usuario linha 66' => $e]);
    //     } finally {

    //     }      
    // }

    /**
     * throw ExemploException
     */
    public function fazAniversarioHoje(string | DateTime $dataAtual) : bool
    {
        if ($dataAtual->diff(new DateTimeImmutable(date('Y-m-d')))) {
            return true;
        }
        throw new ExemploException('Deu ruim no metodo', 2);
        return false;
    }

}
