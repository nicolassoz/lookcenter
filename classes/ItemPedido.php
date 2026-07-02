<?php
include_once "config/conexao.php";

class ItemPedido
{
    private int $id;
    private int $pedido_id;
    private int $produto_id;
    private float $preco;
    private int $quantidade;
    private float $desconto;
    private PDO $pdo;

    public function __construct()
    {
       $this->pdo = obterPdo();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getPedidoId()
    {
        return $this->pedido_id;
    }
    public function setPedidoId(int $pedido_id)
    {
        $this->pedido_id = $pedido_id;
    }

    public function getProdutoId()
    {
        return $this->produto_id;
    }
    public function setProdutoId(int $produto_id)
    {
        $this->produto_id = $produto_id;
    }
    
    public function getPreco()
    {
        return $this->preco;
    }
    public function setPreco(float $preco)
    {
        $this->preco = $preco;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function setQuantidade(int $quantidade)
    {
        $this->quantidade = $quantidade;
    }
    
    public function getDesconto()
    {
        return $this->desconto;
    }
    public function setDesconto(float $desconto)
    {
        $this->desconto = $desconto;
    }

    public function Inserir():bool
    {
        $sql = "INSERT INTO itempedido (pedido_id, produto_id, preco, quantidade, desconto) values (:pedido_id, :produto_id, :preco, :quantidade, :desconto)";

        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":pedido_id", $this->pedido_id);
        $cmd->bindValue(":produto_id", $this->produto_id);
        $cmd->bindValue(":preco", $this->preco);
        $cmd->bindValue(":quantidade", $this->quantidade);  
        $cmd->bindValue(":desconto", $this->desconto);  

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
        $sql = "UPDATE itempedido set pedido_id = :pedido_id, produto_id = :produto_id, preco = :preco, quantidade = :quantidade, desconto = :desconto WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);
        $cmd->bindValue(":pedido_id", $this->pedido_id);
        $cmd->bindValue(":produto_id", $this->produto_id);
        $cmd->bindValue(":preco", $this->preco);
        $cmd->bindValue(":quantidade", $this->quantidade);
        $cmd->bindValue(":desconto", $this->desconto);

        return $cmd->execute();
    }

    public static function Listar(): array 
    {
        $cmd = obterPdo()->query("SELECT * FROM itempedido ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function BuscarPorId(int $id): bool 
    {
        $sql = "SELECT * FROM itempedido WHERE id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id", $id, PDO::PARAM_INT);
        $cmd->execute();

        if ($cmd->rowCount() > 0) 
        {
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            $this->id = (int)$dados['id'];
            $this->setPedidoId($dados['pedido_id']);
            $this->setProdutoId($dados['produto_id']);
            $this->setPreco($dados['preco']);     
            $this->setQuantidade($dados['quantidade']);
            $this->setDesconto($dados['desconto']);
            
            return true;
        }
        return false;
    }

    public function Excluir():bool
    {
        if(!$this->id) return false;

        $sql = "DELETE FROM itempedido WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }
}

?>