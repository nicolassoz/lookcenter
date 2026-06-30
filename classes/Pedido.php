<?php
include_once "config/conexao.php";

class Pedido 
{
    private int $id;
    private int $usuario_id;
    private int $cliente_id;
    private string $data_pedido;
    private string $status;
    private ?float $desconto = null;
    private PDO $pdo;

    public function __construct()
    {
       $this->pdo = obterPdo();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }
    public function setUsuarioId(int $usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function getClienteId()
    {
        return $this->cliente_id;
    }
    public function setClienteId(int $cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    public function getDataPedido()
    {
        return $this->data_pedido;
    }
    public function setDataPedido(string $data_pedido)
    {
        $this->data_pedido = $data_pedido;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function getDesconto()
    {
        return $this->desconto;
    }
    public function setDesconto(?float $desconto)
    {
        $this->desconto = $desconto;
    }

    public function Inserir():bool
    {
        $sql = "INSERT INTO pedidos (usuario_id, cliente_id, status, desconto)
        values (:usuario_id, :cliente_id, :status, :desconto)";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":usuario_id", $this->usuario_id);
        $cmd->bindValue(":cliente_id", $this->cliente_id);
        $cmd->bindValue(":status", $this->status);
        $cmd->bindValue(":desconto", $this->desconto);
        if($cmd->execute())
        {
            $this->id = (int)$this->pdo->lastInsertId();
            return true;
        }
        return false;
    }    

    public static function Listar():array
    {
        $cmd = obterPdo()->query("select * from pedidos order by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function BuscarPorId(int $id):bool
    {
        $sql = "SELECT * FROM pedidos WHERE id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
           
            $this->id = $dados['id'];
            $this->setUsuarioId($dados['usuario_id']);
            $this->setClienteId($dados['cliente_id']);
            $this->setDataPedido($dados['data_pedido']);
            $this->setStatus($dados['status']);
            $this->setDesconto($dados['desconto']);
            return true;
        }
        return false;
    }

    public function Atualizar():bool
    {
        if(!$this->id) return false;
        $sql = "UPDATE pedidos set status = :status, desconto = :desconto WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id); 
        $cmd->bindValue(":status", $this->status);   
        $cmd->bindValue(":desconto", $this->desconto);   
        return $cmd->execute();
    }

    public function Excluir():bool
    {
        if(!$this->id) return false;

        $sql = "DELETE FROM pedidos WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }
}
?>