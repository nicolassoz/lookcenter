<?php
include_once "config/conexao.php";

class Produto
{
    private int $id;
    private string $nome;
    private string $descricao;
    private float $preco;
    private int $categoria_id;
    private int $estoque_minimo;
    private ?float $desconto = null;
    private string $imagem;
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

    public function getImagem()
    {
        return $this->imagem;
    }
    public function setImagem(string $imagem)
    {
        $this->imagem = $imagem;
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
        $sql = "INSERT INTO produtos (nome, descricao, preco, categoria_id, estoque_minimo, desconto, imagem, data_cad, descontinuado)
         values (:nome, :descricao, :preco, :categoria_id, :estoque_minimo, :desconto, :imagem, :data_cad, :descontinuado)";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":descricao", $this->descricao);
        $cmd->bindValue(":preco", $this->preco);
        $cmd->bindValue(":categoria_id", $this->categoria_id);
        $cmd->bindValue(":estoque_minimo", $this->estoque_minimo);
        $cmd->bindValue(":desconto", $this->desconto);
        $cmd->bindValue(":imagem", $this->imagem);
        $cmd->bindValue(":data_cad", $this->data_cad->format('Y-m-d H:i:s'));
        $cmd->bindValue(":descontinuado", $this->descontinuado, PDO::PARAM_BOOL);

        if($cmd->execute())
        {
            $this->id = (int)$this->pdo->lastInsertId();
            return true;
        }
        return false;
    }    

    public static function Listar():array
    {
        $cmd = obterPdo()->query("select * from produtos order by id desc");
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
            $this->id = $dados['id'];
            $this->setNome($dados['nome']);
            $this->setDescricao($dados['descricao']);
            $this->setPreco($dados['preco']);
            $this->setCategoriaId($dados['categoria_id']);
            $this->setEstoqueMinimo($dados['estoque_minimo']);
            $this->setDesconto($dados['desconto']);
            $this->setImagem($dados['imagem']);
            $this->setDataCad(new DateTime($dados['data_cad']));
            $this->setDescontinuado((bool)$dados['descontinuado']);            
            return true;
        }
        return false;
    }

    public function BuscarPorId(int $id):bool
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);

        if($dados)        
        {
            $this->id = $dados['id'];
            $this->setNome($dados['nome']);
            $this->setDescricao($dados['descricao']);
            $this->setPreco($dados['preco']);
            $this->setCategoriaId($dados['categoria_id']);
            $this->setEstoqueMinimo($dados['estoque_minimo']);
            $this->setDesconto($dados['desconto']);
            $this->setImagem($dados['imagem']);
            $this->setDataCad(new DateTime($dados['data_cad']));
            $this->setDescontinuado((bool)$dados['descontinuado']);
            return true;
        }
        return false;
    }

    public function Atualizar():bool
    {
        if(!$this->id) return false;
        $sql = "UPDATE produtos set nome = :nome, descricao = :descricao, preco = :preco, categoria_id = :categoria_id, estoque_minimo = :estoque_minimo, desconto = :desconto, imagem = :imagem, descontinuado = :descontinuado WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);
        
        $cmd->bindValue(":id", $this->id);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":descricao", $this->descricao);
        $cmd->bindValue(":preco", $this->preco);
        $cmd->bindValue(":categoria_id", $this->categoria_id);
        $cmd->bindValue(":estoque_minimo", $this->estoque_minimo);
        $cmd->bindValue(":desconto", $this->desconto);
        $cmd->bindValue(":imagem", $this->imagem);
        $cmd->bindValue(":descontinuado", $this->descontinuado, PDO::PARAM_BOOL);  
        
        return $cmd->execute();
    }

    public function Excluir():bool
    {
        if(!$this->id) return false;

        $sql = "DELETE FROM produtos WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }
}
?>