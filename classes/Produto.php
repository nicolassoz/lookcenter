<?php
include_once "config/conexao.php";

class Produto
{
    private int $id_produto;
    private string $nome;
    private string $descricao;
    private float $preco;
    private int $categoria_id;
    private int $estoque_minimo;
    private ?float $desconto = null;
    private DateTime $data_cad;
    private bool $descontinuado;
    private PDO $pdo;

    public function __construct()
    {
       $this->pdo = obterPdo();
    }

    public function getId_Produto()
    {
        return $this->id_produto;
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
    public function setDesconto(?float $desconto)
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

    public function Inserir():bool
    {
        $sql = "INSERT INTO produtos (nome, descricao, preco, categoria_id, estoque_minimo, desconto, descontinuado)
         values (:nome, :descricao, :preco, :categoria_id, :estoque_minimo, :desconto, :descontinuado)";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":descricao", $this->descricao);
        $cmd->bindValue(":preco", $this->preco);
        $cmd->bindValue(":categoria_id", $this->categoria_id);
        $cmd->bindValue(":estoque_minimo", $this->estoque_minimo);
        $cmd->bindValue(":desconto", $this->desconto);
        $cmd->bindValue(":descontinuado", $this->descontinuado, PDO::PARAM_BOOL);

        if($cmd->execute())
        {
            $this->id_produto = (int)$this->pdo->lastInsertId();
            return true;
        }
        return false;
    }    

    public static function Listar():array
    {
        $cmd = obterPdo()->query("select * from produtos order by id_produto desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function BuscarPorNome(string $nome):bool
    {
        $sql = "SELECT * FROM produtos WHERE nome = :nome";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":nome",$nome);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);

        if($dados)        
        {
            $this->id_produto = $dados['id_produto'];
            $this->setNome($dados['nome']);
            $this->setDescricao($dados['descricao']);
            $this->setPreco($dados['preco']);
            $this->setCategoriaId($dados['categoria_id']);
            $this->setEstoqueMinimo($dados['estoque_minimo']);
            $this->setDesconto($dados['desconto']);
            $this->setDataCad(new DateTime($dados['data_cad']));
            $this->setDescontinuado((bool)$dados['descontinuado']);            
            return true;
        }
        return false;
    }

    public function BuscarPorId(int $id_produto):bool
    {
        $sql = "SELECT * FROM produtos WHERE id_produto = :id_produto";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id_produto",$id_produto);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);

        if($dados)        
        {
            $this->id_produto = $dados['id_produto'];
            $this->setNome($dados['nome']);
            $this->setDescricao($dados['descricao']);
            $this->setPreco($dados['preco']);
            $this->setCategoriaId($dados['categoria_id']);
            $this->setEstoqueMinimo($dados['estoque_minimo']);
            $this->setDesconto($dados['desconto']);
            $this->setDataCad(new DateTime($dados['data_cad']));
            $this->setDescontinuado((bool)$dados['descontinuado']);
            return true;
        }
        return false;
    }

    public function Atualizar():bool
    {
        if(!$this->id_produto) return false;
        $sql = "UPDATE produtos set nome = :nome, descricao = :descricao, preco = :preco, categoria_id = :categoria_id, estoque_minimo = :estoque_minimo, desconto = :desconto, descontinuado = :descontinuado WHERE id_produto = :id_produto";

        $cmd = $this->pdo->prepare($sql);
        
        $cmd->bindValue(":id_produto", $this->id_produto);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":descricao", $this->descricao);
        $cmd->bindValue(":preco", $this->preco);
        $cmd->bindValue(":categoria_id", $this->categoria_id);
        $cmd->bindValue(":estoque_minimo", $this->estoque_minimo);
        $cmd->bindValue(":data_cad", $this->data_cad);
        $cmd->bindValue(":descontinuado", $this->descontinuado, PDO::PARAM_BOOL);  
        
        return $cmd->execute();
    }

    public function Excluir():bool
    {
        if(!$this->id_produto) return false;

        $sql = "DELETE FROM produtos WHERE id_produto = :id_produto";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_produto", $this->id_produto, PDO::PARAM_INT);

        return $cmd->execute();
    }
}
?>