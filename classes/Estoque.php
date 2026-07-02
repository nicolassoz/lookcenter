<?php
include_once "config/conexao.php";

class Estoque
{
    private int $id;
    private int $produto_id;
    private int $quantidade;
    private DateTime $data_ult_mov;
    private PDO $pdo;

    public function __construct()
    {
       $this->pdo = obterPdo();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getProdutoId()
    {
        return $this->produto_id;
    }
    public function setProdutoId(int $produto_id)
    {
        $this->produto_id = $produto_id;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function setQuantidade(int $quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getDataUltMov()
    {
        return $this->data_ult_mov;
    }
    public function setDataUltMov(DateTime $data_ult_mov)
    {
        $this->data_ult_mov = $data_ult_mov;
    }

    public function Inserir():bool
    {
        $sql = "INSERT INTO estoque (produto_id, quantidade, data_ult_mov) values (:produto_id, :quantidade, :data_ult_mov)";

        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":produto_id", $this->produto_id);
        $cmd->bindValue(":quantidade", $this->quantidade);
        $cmd->bindValue(":data_ult_mov", $this->data_ult_mov);  

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
        $sql = "UPDATE estoques set produto_id = :produto_id, quantidade = :quantidade, data_ult_mov = :data_ult_mov WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);
        $cmd->bindValue(":produto_id", $this->produto_id);
        $cmd->bindValue(":quantidade", $this->quantidade);
        $cmd->bindValue(":data_ult_mov", $this->data_ult_mov);  
           
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
            $this->setProdutoId($dados['produto_id']);
            $this->setQuantidade($dados['quantidade']);
            $this->setDataUltMov($dados['data_ult_mov']);
            
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