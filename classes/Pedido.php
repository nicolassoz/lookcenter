<?php
include_once "config/conexao.php";

//Classe responsável pelo gerenciamento dos pedidos do sistema
class Pedido 
{
    //Identificador único do pedido
    private int $id;

    //Identificador do cliente ao qual o pedido pertence
    private int $cliente_id;

    //Data e hora em que o pedido foi realizado
    private DateTime $data_pedido;

    /**
    * Situação atual do pedido.
    * Exemplo: Pendente, Em andamento, Concluído ou Cancelado.
    */
    private string $status;

    /*
    * Valor do desconto aplicado ao pedido.
    * Pode ser nulo caso não exista desconto.
    */
    private ?float $desconto = null;

    //Objeto responsável pela conexão com o banco de dados
    private PDO $pdo;


    /**
     * Construtor da classe.
     *
     * Inicializa a conexão com o banco de dados que será utilizada
     * pelos métodos de manipulação dos pedidos.
     */
    public function __construct()
    {
       $this->pdo = obterPdo();
    }
    
    //Retorna o identificador do usuário
    public function getId()
    {
        return $this->id;
    }


    //Retorna o identificador do cliente
    public function getClienteId()
    {
        return $this->cliente_id;
    }

    //
    public function setClienteId(int $cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    //
    public function getDataPedido()
    {
        return $this->data_pedido;
    }

    //
    public function setDataPedido(DateTime $data_pedido)
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
            $this->setClienteId($dados['cliente_id']);
            $this->setDataPedido(new DateTime($dados['data_pedido']));
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