<?php
include_once "config/conexao.php";


// Classe responsável pelo gerenciamento dos níveis de acesso do sistema
class Nivel
{
    // Identificador único do nível.
    private int $id;

    // Nome do nível de acesso.
    private string $nome;

    // Sigla utilizada para identificar o nível.
    private string $sigla;

    // Objeto responsável pela conexão com o banco de dados.
    private PDO $pdo;


    // Construtor da classe.
    // Inicializa a conexão com o banco de dados utilizando PDO.
    public function __construct()
    {
        $this->pdo = obterPdo();
    }

    // Retorna o identificador do nível.
    public function getId()
    {
        return $this->id;
    }

    // Retorna o nome do nível.
    public function getNome()
    {
        return $this->nome;
    }

    // Define o nome do nível.
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    // Retorna a sigla do nível.
    public function getSigla()
    {
        return $this->sigla;
    }

    // Define a sigla do nível.
    public function setSigla(string $sigla)
    {
         $this->sigla = $sigla;
    }


    /**
     * Insere um novo nível no banco de dados.
     *
     * Após a inserção, o ID gerado é atribuído ao objeto.
     *
    */
    public function Inserir():bool
    {
        $sql = "INSERT INTO niveis (nome, sigla)
         values (:nome, :sigla)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":sigla", $this->sigla);
        
        if($cmd->execute())
        {
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }    


    /**
     * Lista todos os níveis cadastrados.
     *
     * Os registros são retornados em ordem decrescente de ID.
     *
    */
    public static function Listar():array
    {
        $cmd = obterPdo()->query("select * from niveis order by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Busca um nível pelo seu identificador.
     *
     * Caso encontrado, os atributos do objeto são preenchidos
     * com os dados obtidos do banco de dados.
     *
    */
    public function BuscarPorId(int $id):bool
    {
        $sql = "SELECT * FROM niveis WHERE id = :id";
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
     * Atualiza os dados do nível no banco de dados.
     *
     * O nível deve possuir um identificador válido.
     *
    */
    public function Atualizar():bool
    {
        if(!$this->id) return false;
        $sql = "UPDATE niveis
                set nome = :nome, sigla = :sigla
                WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id); 
        $cmd->bindValue(":nome", $this->nome);   
        $cmd->bindValue(":sigla", $this->sigla);   
        return $cmd->execute();
    }


    /**
     * Exclui o nível do banco de dados.
     *
     * O nível deve possuir um identificador válido.
     *
    */
    public function Excluir():bool
    {
        if(!$this->id) return false;

        $sql = "DELETE FROM niveis WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

}
?>