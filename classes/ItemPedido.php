<?php
include_once "config/conexao.php";

//Classe responsável pelo gerenciamento dos itens de pedidos do sistema.
class ItemPedido
{
    //Identificador único do item do pedido.
    private int $id;

    //Identificador do pedido ao qual o item pertence.
    private int $pedido_id;
    
    //Identificador do produto associado ao item.
    private int $produto_id;
    
    //Preço unitário do produto no momento da venda.
    private float $preco;
    
    //Quantidade do produto no pedido.
    private int $quantidade;
    
    //Valor do desconto aplicado ao item.
    private float $desconto;
    
    //Instância da conexão com o banco de dados.
    private PDO $pdo;


    //Inicializa a conexão com o banco de dados.
    public function __construct()
    {
       $this->pdo = obterPdo();
    }
    
    //Retorna o identificador do item do pedido.
    public function getId()
    {
        return $this->id;
    }

    //Retorna o identificador do pedido.
    public function getPedidoId()
    {
        return $this->pedido_id;
    }

    //Define o identificador do pedido.
    public function setPedidoId(int $pedido_id)
    {
        $this->pedido_id = $pedido_id;
    }

    //Retorna o identificador do produto.
    public function getProdutoId()
    {
        return $this->produto_id;
    }

    //Define o identificador do produto.
    public function setProdutoId(int $produto_id)
    {
        $this->produto_id = $produto_id;
    }
    
    //Retorna o preço do produto.
    public function getPreco()
    {
        return $this->preco;
    }

    //Define o preço do produto.
    public function setPreco(float $preco)
    {
        $this->preco = $preco;
    }

    //Retorna a quantidade do produto.
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    //Define a quantidade do produto.
    public function setQuantidade(int $quantidade)
    {
        $this->quantidade = $quantidade;
    }
    
    //Retorna o valor do desconto aplicado ao item.
    public function getDesconto()
    {
        return $this->desconto;
    }

    //Define o valor do desconto aplicado ao item
    public function setDesconto(float $desconto)
    {
        $this->desconto = $desconto;
    }


    /**
     * Insere um novo item de pedido no banco de dados.
     *
     * Após a inserção, o ID gerado é atribuído ao objeto.
     *
    */
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


    /**
     * Atualiza os dados do item pedido no banco de dados.
     *
     * O item pedido deve possuir um identificador válido.
     *
    */
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


    /**
     * Lista todos os item pedido cadastrados.
     *
     * Os registros são retornados em ordem decrescente de ID.
     *
    */
    public static function Listar(): array 
    {
        $cmd = obterPdo()->query("SELECT * FROM itempedido ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Busca um item pedido pelo seu identificador.
     *
     * Caso encontrado, os atributos do objeto são preenchidos
     * com os dados obtidos do banco de dados.
     *
    */
    public function BuscarPorId(int $id): bool 
    {
        $sql = "SELECT * FROM itempedido WHERE id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id", $id, PDO::PARAM_INT);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        if ($dados) 
        {
            

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


    /**
     * Exclui o item pedido do banco de dados.
     *
     * O item pedido deve possuir um identificador válido.
     *
     */
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