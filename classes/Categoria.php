<?php
include_once "config/conexao.php";

//Classe responsável pelo gerenciamento das categorias de produtos do sistema.
class Categoria
{
    //Identificador único da categoria.
    private int $id;

    //Nome da categoria.
    private string $nome;

    //Sigla utilizada para identificar a categoria.
    private string $sigla;

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

    //Retorna o identificador da categoria.
    public function getId()
    {
        return $this->id;
    }

    //Retorna o nome da categoria.
    public function getNome()
    {
        return $this->nome;
    }

    //Define o nome da categoria.
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    //Retorna a sigla da categoria.
    public function getSigla()
    {
        return $this->sigla;
    }

    //Define a sigla da categoria.
    public function setSigla(string $sigla)
    {
         $this->sigla = $sigla;
    }


    /**
     * Insere uma nova categoria no banco de dados.
     *
     * Após a inserção, o ID gerado é atribuído ao objeto.
     *
    */
    public function Inserir():bool
    {
        $sql = "INSERT INTO categorias (nome, sigla)
         values (:nome, :sigla)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":sigla", $this->sigla);
        
        if($cmd->execute())
        {
            $this->id = (int)$this->pdo->lastInsertId();
            return true;
        }
        return false;
    }    


    /**
     * Lista todas as categorias cadastradas.
     *
     * Os registros são retornados em ordem decrescente de ID.
     *
    */
    public static function Listar():array
    {
        $cmd = obterPdo()->query("select * from categorias order by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Busca uma categoria pelo seu identificador.
     *
     * Caso encontrada, os atributos do objeto são preenchidos
     * com os dados obtidos do banco de dados.
     *
    */
    public function BuscarPorId(int $id):bool
    {
        $sql = "SELECT * FROM categorias WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);

        if($dados)
        {
            $this->id = $dados['id'];
            $this->setNome($dados['nome']);
            $this->setSigla($dados['sigla']);
            return true;
        }
        return false;
    }


    /**
     * Atualiza os dados da categoria no banco de dados.
     *
     * A categoria deve possuir um identificador válido.
     *
    */
    public function Atualizar():bool
    {
        if(!$this->id) return false;
        $sql = "UPDATE categorias
                set nome = :nome, sigla = :sigla
                WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);        $cmd->bindValue(":nome", $this->nome);   
        $cmd->bindValue(":sigla", $this->sigla);   
        return $cmd->execute();
    }


    /**
     * Exclui a categoria do banco de dados.
     *
     * A categoria deve possuir um identificador válido.
     *
    */
    public function Excluir():bool
    {
        if(!$this->id) return false;

        $sql = "DELETE FROM categorias WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

}
?>