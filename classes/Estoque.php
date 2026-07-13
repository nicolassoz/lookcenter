<?php
include_once "config/conexao.php";

//Classe responsável pelo gerenciamento do estoque dos produtos.
class Estoque
{
    //Identificador único do registro de estoque.
    private int $id;

    //Identificador do produto relacionado ao estoque.
    private int $id_produto;

    //Quantidade disponível em estoque.
    private int $quantidade;

    //Data e hora da última movimentação do estoque.
    private DateTime $data_ultimo_movimento;

    //Objeto responsável pela conexão com o banco de dados.
    private PDO $pdo;

    /**
     * Construtor da classe.
     *
     * Inicializa a conexão com o banco de dados utilizando PDO.
    */
    public function __construct()
    {
       $this->pdo = obterPdo();
    }
    
    //Retorna o identificador do registro de estoque.
    public function getId()
    {
        return $this->id;
    }

    //Retorna o identificador do produto.
    public function getIdProduto()
    {
        return $this->id_produto;
    }

    //Define o identificador do produto.
    public function setIdProduto(int $id_produto)
    {
        $this->id_produto = $id_produto;
    }

    //Retorna a quantidade disponível em estoque.
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    //Define a quantidade disponível em estoque.
    public function setQuantidade(int $quantidade)
    {
        $this->quantidade = $quantidade;
    }

    //Retorna a data da última movimentação do estoque.
    public function getDataUltimoMovimento()
    {
        return $this->data_ultimo_movimento;
    }

    //Define a data da última movimentação do estoque.
    public function setDataUltimoMovimento(DateTime $data_ultimo_movimento)
    {
        $this->data_ultimo_movimento = $data_ultimo_movimento;
    }


    /**
     * Insere um novo registro de estoque no banco de dados.
     *
     * Após a inserção, o ID gerado é atribuído ao objeto.
     *
    */
    public function Inserir():bool
    {
        $sql = "INSERT INTO estoques (id_produto, quantidade, data_ultimo_movimento) values (:id_produto, :quantidade, :data_ultimo_movimento)";

        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":id_produto", $this->id_produto);
        $cmd->bindValue(":quantidade", $this->quantidade);
        $cmd->bindValue( ":data_ultimo_movimento", $this->data_ultimo_movimento->format('Y-m-d') );

        if($cmd->execute())
        {
            $this->id = (int)$this->pdo->lastInsertId();
            return true;
        }
        return false;
    }


    /**
     * Atualiza os dados do registro de estoque no banco de dados.
     *
     * O registro deve possuir um identificador válido.
     *
    */
    public function Atualizar():bool
    {
        if(!$this->id) return false;
        $sql = "UPDATE estoques set id_produto = :id_produto, quantidade = :quantidade, data_ultimo_movimento = :data_ultimo_movimento WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);
        $cmd->bindValue(":id_produto", $this->id_produto);
        $cmd->bindValue(":quantidade", $this->quantidade);
        $cmd->bindValue(":data_ultimo_movimento",$this->data_ultimo_movimento->format('Y-m-d'));           
        return $cmd->execute();
    }


    /**
     * Lista todos os registros de estoque cadastrados.
     *
     * Os registros são retornados em ordem decrescente de ID.
     *
    */
    public static function Listar(): array 
    {
        $cmd = obterPdo()->query("SELECT * FROM estoques ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Busca um registro de estoque pelo seu identificador.
     *
     * Caso encontrado, os atributos do objeto são preenchidos
     * com os dados obtidos do banco de dados.
     *
    */
    public function BuscarPorId(int $id): bool 
    {
        $sql = "SELECT * FROM estoques WHERE id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id", $id, PDO::PARAM_INT);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        
        if ($dados) 
        {
            $this->id = (int)$dados['id'];
            $this->setIdProduto($dados['id_produto']);
            $this->setQuantidade($dados['quantidade']);
            $this->setDataUltimoMovimento(new DateTime($dados['data_ultimo_movimento']));            
            return true;
        }
        return false;
    }


     /**
     * Exclui um registro de estoque do banco de dados.
     *
     * O registro deve possuir um identificador válido.
     *
    */
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