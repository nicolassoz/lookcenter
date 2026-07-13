<?php
include_once "config/conexao.php";

//Classe responsável pelo gerenciamento dos produtos do sistema.
class Produto
{
    //Identificador único do produto
    private int $id_produto;
 
    //Nome do produto
    private string $nome;
 
    //Descrição detalhada do produto
    private string $descricao;
 
    //Preço de venda do produto
    private float $preco;
 
    //Identificador da categoria à qual o produto pertence
    private int $categoria_id;
 
    //Quantidade mínima em estoque antes de indicar necessidade de reposição
    private int $estoque_minimo;
 
    //Percentual ou valor de desconto aplicado ao produto
    //Pode ser nulo caso o produto não possua desconto
    private ?float $desconto = null;
 
    //Data de cadastro do produto
    private DateTime $data_cad;
 
    //Indica se o produto foi descontinuado
    private bool $descontinuado;
 
    //Objeto responsável pela conexão com o banco de dados
    private PDO $pdo;

    //Construtor da classe
    public function __construct()
    {
        //Inicializa a conexão com o banco de dados e define a data de cadastro com a data atual.
       $this->pdo = obterPdo();
       $this->data_cad = new DateTime();
    }

    //Retorna o identificador do produto
    public function getIdProduto()
    {
        return $this->id_produto;
    }

    //Retorna o nome do produto
    public function getNome()
    {
        return $this->nome;
    }

    //Define o nome do produto
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    //Retorna a descrição do produto
    public function getDescricao()
    {
        return $this->descricao;
    }

    //Define a descrição do produto
    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    //Retorna o preço do produto
    public function getPreco()
    {
        return $this->preco;
    }

    //Define o preço do produto
    public function setPreco(float $preco)
    {
        $this->preco = $preco;
    }

    //Retorna o identificador da categoria do produto
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    //Define a categoria do produto
    public function setCategoriaId(int $categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    //Retorna o estoque mínimo do produto
    public function getEstoqueMinimo()
    {
        return $this->estoque_minimo;
    }

    //Define o estoque mínimo do produto
    public function setEstoqueMinimo(int $estoque_minimo)
    {
        $this->estoque_minimo = $estoque_minimo;
    }

    //Retorna o desconto do produto
    public function getDesconto()
    {
        return $this->desconto;
    }

    //Define o desconto do produto
    public function setDesconto(?float $desconto)
    {
        $this->desconto = $desconto;
    }

    //Retorna a data de cadastro do produto
    public function getDataCad()
    {
        return $this->data_cad;
    }

    //Define a data de cadastro do produto
    public function setDataCad(DateTime $data_cad)
    {
        $this->data_cad = $data_cad;
    }

    //Retorna o status de descontinuação do produto
    public function getDescontinuado()
    {
        return $this->descontinuado;
    }

    //Define se o produto está descontinuado
    public function setDescontinuado(bool $descontinuado)
    {
        $this->descontinuado = $descontinuado;
    }
    
    /*Insere um novo produto no banco de dados.
     * 
     * Após a inserção, armazena o identificador gerado automaticamente.
     * 
     * Retorna true em caso de sucesso e false caso ocorra alguma falha.
    */
    public function Inserir():bool
    {
        $sql = "INSERT INTO produtos (nome, descricao, preco, categoria_id, estoque_minimo, desconto, data_cad, descontinuado)
         values (:nome, :descricao, :preco, :categoria_id, :estoque_minimo, :desconto, :data_cad, :descontinuado)";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":descricao", $this->descricao);
        $cmd->bindValue(":preco", $this->preco);
        $cmd->bindValue(":categoria_id", $this->categoria_id);
        $cmd->bindValue(":estoque_minimo", $this->estoque_minimo);
        $cmd->bindValue(":desconto", $this->desconto);
        $cmd->bindValue(":data_cad", $this->data_cad->format('Y-m-d'));
        $cmd->bindValue(":descontinuado",$this->descontinuado ? 1 : 0,
        PDO::PARAM_INT);
        if($cmd->execute())
        {
            $this->id_produto = (int)$this->pdo->lastInsertId();
            return true;
        }
        return false;
    }    


    /**
     * Lista todos os produtos cadastrados.
     *
     * Os registros são retornados em ordem decrescente
     * pelo identificador do produto.
     *
    */
    public static function Listar():array
    {
        $cmd = obterPdo()->query("select * from produtos order by id_produto desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Busca um produto pelo nome.
     *
     * Caso encontrado, os dados são carregados
     * nos atributos do objeto.
     *
    */
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


    /**
     * Busca um produto pelo identificador.
     *
     * Caso encontrado, os dados são carregados
     * nos atributos do objeto.
     *
    */
    public function BuscarPorId(int $id):bool
    {
        $sql = "SELECT * FROM produtos WHERE id_produto = :id_produto";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id_produto", $id, PDO::PARAM_INT);
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


    /**
     * Atualiza os dados do produto no banco de dados.
     *
     * O produto deve possuir um identificador válido.
     *
    */
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
        $cmd->bindValue(":desconto", $this->desconto);
        $cmd->bindValue(":descontinuado",$this->descontinuado ? 1 : 0,
        PDO::PARAM_INT);  
        
        return $cmd->execute();
    }


    /**
     * Exclui o produto do banco de dados.
     *
     * O produto deve possuir um identificador válido.
     *
    */
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