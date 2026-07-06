<?php
include_once "config/conexao.php";

class Estoque
{
    private int $id;
    private int $id_produto;
    private int $quantidade;
    private DateTime $data_ultimo_movimento;
    private PDO $pdo;

    public function __construct()
    {
       $this->pdo = obterPdo();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getIdProduto()
    {
        return $this->id_produto;
    }
    public function setIdProduto(int $id_produto)
    {
        $this->id_produto = $id_produto;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function setQuantidade(int $quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getDataUltimoMovimento()
    {
        return $this->data_ultimo_movimento;
    }
    public function setDataUltimoMovimento(DateTime $data_ultimo_movimento)
    {
        $this->data_ultimo_movimento = $data_ultimo_movimento;
    }

    public function Inserir():bool
    {
        $sql = "INSERT INTO estoques (id_produto, quantidade, data_ultimo_movimento) values (:id_produto, :quantidade, :data_ultimo_movimento)";

        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":id_produto", $this->id_produto);
        $cmd->bindValue(":quantidade", $this->quantidade);
        $cmd->bindValue( ":data_ultimo_movimento", $this->data_ultimo_movimento->format('Y-m-d H:i:s') );

        if($cmd->execute())
        {
            $this->id = (int)$this->pdo->lastInsertId();
            return true;
        }
        return false;
    }

    public function Atualizar():bool
    {
        if(!$this->id) return false;
        $sql = "UPDATE estoques set id_produto = :id_produto, quantidade = :quantidade, data_ultimo_movimento = :data_ultimo_movimento WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);
        $cmd->bindValue(":id_produto", $this->id_produto);
        $cmd->bindValue(":quantidade", $this->quantidade);
        $cmd->bindValue(":data_ultimo_movimento",$this->data_ultimo_movimento->format('Y-m-d H:i:s'));           
        return $cmd->execute();
    }

    public static function Listar(): array 
    {
        $cmd = obterPdo()->query("SELECT * FROM estoques ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function BuscarPorId(int $id): bool 
    {
        $sql = "SELECT * FROM estoques WHERE id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id", $id, PDO::PARAM_INT);
        $cmd->execute();

        if ($cmd->rowCount() > 0) 
        {
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            $this->id = (int)$dados['id'];
            $this->setIdProduto($dados['id_produto']);
            $this->setQuantidade($dados['quantidade']);
            $this->setDataUltimoMovimento(new DateTime($dados['data_ultimo_movimento']));            
            return true;
        }
        return false;
    }

    public function Excluir():bool
    {
        if(!$this->id) return false;

        $sql = "DELETE FROM estoques WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }
}
?>