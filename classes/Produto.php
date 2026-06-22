<?php
include_once "config/conexao.php";
include_once "classes/Imagem.php";

class Produto
{
    private int $id;
    private string $nome;
    private string $descricao;
    private float $preco;
    private string $unidade_venda;
    private int $categoria_id;
    private int $estoque_minimo;
    private float $desconto;
    private DateTime $data_cad;
    private bool $descontinuado;
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

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public function getPreco()
    {
        return $this->preco;
    }
    public function setPreco(float $preco)
    {
        $this->preco = $preco;
    }

    public function getUnidadeVenda()
    {
        return $this->unidade_venda;
    }
    public function setUnidadeVenda(string $unidade_venda)
    {
        $this->unidade_venda = $unidade_venda;
    }

    public function getCategoriaId()
    {
        return $this->categoria_id;
    }
    public function setCategoriaId(int $categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    public function getEstoqueMinimo()
    {
        return $this->estoque_minimo;
    }
    public function setEstoqueMinimo(int $estoque_minimo)
    {
        $this->estoque_minimo = $estoque_minimo;
    }

    public function getDesconto()
    {
        return $this->desconto;
    }
    public function setDesconto(float $desconto)
    {
        $this->desconto = $desconto;
    }

    public function getDataCad()
    {
        return $this->data_cad;
    }
    public function setDataCad(DateTime $data_cad)
    {
        $this->data_cad = $data_cad;
    }

    public function getDescontinuado()
    {
        return $this->descontinuado;
    }
    public function setDescontinuado(bool $descontinuado)
    {
        $this->descontinuado = $descontinuado;
    }
}


?>