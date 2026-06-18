<?php
include_once "config/conexao.php";

class Nivel
{
    private int $id;
    private string $nome;
    private string $sigla;
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = obterPdo();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getSigla()
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla)
    {
        return $this->sigla = $sigla;
    }

}

?>