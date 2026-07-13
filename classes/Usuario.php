<?php
include_once "config/conexao.php";

//Classe responsável pelo gerenciamento dos usuários do sistema.
class Usuario
{
    //Identificador único do usuário
    private int $id;
    
    //Nome completo do usuário
    private string $nome;
    
    //E-mail do usuário
    private string $email;
    
    //Senha do usuário
    private string $senha;
    
    //Identificador do nível de acesso do usuário
    private int $nivel_id;
    
    //Indica se o usuário está ativo
    private bool $ativo;
    
    //Objeto de conexão com o banco de dados
    private PDO $pdo;

    //Construtor da classe
    public function __construct()
    {
        //Inicializa a conexão com o banco de dados
       $this->pdo = obterPdo();
    }
    
    //Retorna o ID do usuário
    public function getId()
    {
        return $this->id;
    }

    //Retorna o nome do usuário
    public function getNome()
    {
        return $this->nome;
    }

    //Define o nome do usuário
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    //Retorna o e-mail do usuário
    public function getEmail()
    {
        return $this->email;
    }

    //Define o e-mail do usuário
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    //Retorna a senha do usuário
    public function getSenha()
    {
        return $this->senha;
    }

    //Define a senha do usuário
    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    //Retorna o ID do nível de acesso do usuário
    public function getNivelId()
    {
        return $this->nivel_id;
    }

    //Define o nível de acesso do usuário
    public function setNivelId(int $nivel_id)
    {
        $this->nivel_id = $nivel_id;
    }

    //Retorna o status de ativação do usuário
    public function getAtivo()
    {
        return $this->ativo;
    }

    //Define se o usuário está ativo
    public function setAtivo(bool $ativo)
    {
        $this->ativo = $ativo;
    }


    /*
     * Realiza a autenticação de um usuário.
     *
     * Busca um usuário pelo e-mail informado e compara a senha fornecida
     * com a senha armazenada no banco de dados.
     *
     * Retorna os dados do usuário caso a autenticação seja válida ou um
     * array vazio.
    */
    public static function EfetuarLogin(string $email, string $senha):array
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":email", $email);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        // var_dump($dados);
        // exit;

        // if($dados && password_verify($senha, $dados['senha']))
        if($dados && $senha === $dados['senha'])
        {
            return $dados;
            
        }
        else
        {
            return [];    
        }
    }


    /*
     * Insere um novo usuário no banco de dados.
     *
     * O método grava os dados do usuário na tabela `usuarios`.

     * Antes de armazenar a senha, ela é criptografada utilizando
     * a função password_hash() com o algoritmo PASSWORD_DEFAULT.

     * Após a inserção, o atributo `$id` recebe o identificador
     * gerado automaticamente pelo banco de dados.
    */
    public function Inserir():bool
    {
        $sql = "INSERT INTO usuarios (nome, email, senha, nivel_id)
         values (:nome, :email, :senha, :nivel_id)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":email", $this->email);
        $cmd->bindValue(":senha", password_hash($this->senha,PASSWORD_DEFAULT));
        $cmd->bindValue(":nivel_id", $this->nivel_id);
        if($cmd->execute())
        {
            $this->id = (int)$this->pdo->lastInsertId();
            return true;
        }
        return false;
    }    
    

    /*
     * Lista todos os usuários cadastrados.
     *
     * Os registros são retornados em ordem decrescente de ID,
     * exibindo primeiro os usuários mais recentemente cadastrados.
    */
    public static function Listar():array
    {
        $cmd = obterPdo()->query("select * from usuarios order by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    /*
     * Busca um usuário pelo endereço de e-mail.
     *
     * Caso o usuário seja encontrado, os atributos do objeto são
     * preenchidos com os dados retornados pelo banco.
    */
    public function BuscarPorEmail(string $email):bool
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":email",$email);

        $cmd->execute();

        $dados = $cmd->fetch(PDO::FETCH_ASSOC);

        if($dados)
        {
            $this->id = $dados['id'];
            $this->setNome($dados['nome']);
            $this->setEmail($dados['email']);
            $this->setSenha($dados['senha']);
            $this->setNivelId($dados['nivel_id']);
            $this->setAtivo((bool)$dados['ativo']);

            return true;
        }
        return false;
    }


    /*
     * Busca um usuário pelo seu ID.
     *
     * Caso o registro seja encontrado, os atributos do objeto
     * são preenchidos com as informações obtidas no banco.
     *
    */
    public function BuscarPorId(int $id):bool
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id",$id);

        $cmd->execute();

        $dados = $cmd->fetch(PDO::FETCH_ASSOC);

        if($dados)
        {
            $this->id = $dados['id'];
            $this->setNome($dados['nome']);
            $this->setEmail($dados['email']);
            $this->setSenha($dados['senha']);
            $this->setNivelId($dados['nivel_id']);
            $this->setAtivo((bool)$dados['ativo']);

            return true;
        }
        return false;
    }


    /*
     * Atualiza os dados de um usuário já cadastrado.
     *
     * O método altera apenas o nome, e-mail, nível de acesso e status de ativação do usuário. 
     * A senha não é alterada por este método.
    */
    public function Atualizar():bool
    {
        if(!$this->id) return false;
        $sql = "UPDATE usuarios set nome = :nome, email = :email, nivel_id = :nivel_id, ativo = :ativo WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);
        $cmd->bindValue(":nome", $this->nome);   
        $cmd->bindValue(":email", $this->email);   
        $cmd->bindValue(":nivel_id", $this->nivel_id);   
        $cmd->bindValue(":ativo", $this->ativo ? 1 : 0, PDO::PARAM_INT);

        return $cmd->execute();
    }


    /*
     * Atualiza a senha de um usuário.
     *
     * A nova senha é criptografada utilizando password_hash()
     * antes de ser armazenada no banco de dados.
    */
    public function AtualizarSenha(string $senha):bool
    {
        if(!$this->id) return false;

        $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":senha", password_hash($senha, PASSWORD_DEFAULT));
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }


    /*
     * Exclui um usuário do banco de dados.
     *
     * A exclusão é realizada utilizando o ID armazenado
     * no objeto.
    */
    public function Excluir():bool
    {
        if(!$this->id) return false;

        $sql = "DELETE FROM usuarios WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

}
?>