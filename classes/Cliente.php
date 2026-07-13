<?php
include_once "config/conexao.php";

//Classe responsável pelo gerenciamento dos clientes do sistema.
class Cliente
{
    //Identificador único do cliente.
    private int $id;

    //Nome completo do cliente.
    private string $nome;
    
    //CPF do cliente.
    private string $cpf;
    
    //Telefone de contato do cliente.
    private string $telefone;
    
    //Endereço de e-mail do cliente.
    private string $email;
    
    //Data de nascimento do cliente.
    private DateTime $data_nasc;
    
    //Data de cadastro do cliente.
    private DateTime $data_cad;
    
    //Indica se o cliente está ativo.
    private bool $ativo;
    
    //Identificador do usuário responsável pelo cadastro do cliente.
    private int $usuario_id;
    
    //Objeto responsável pela conexão com o banco de dados.
    private PDO $pdo;    

    /**
     * Construtor da classe.
     *
     * Inicializa a conexão com o banco de dados e define a data
     * atual como data de cadastro.
     */
    public function __construct()
    {
        $this->pdo = obterPdo();
        $this->data_cad = new DateTime();
    }

    //Retorna o identificador do cliente.
    public function getId()
    {
        return $this->id;
    }

    //Retorna o telefone do cliente.
    public function getTelefone()
    {
        return $this->telefone;
    }

    //Define o telefone do cliente.
    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

    //Retorna o CPF do cliente.
    public function getCpf()
    {
        return $this->cpf;
    }

    //Define o CPF do cliente.
    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    //Retorna o nome do cliente.
    public function getNome()
    {
        return $this->nome;
    }

    //Define o nome do cliente.
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    //Retorna o e-mail do cliente.
    public function getEmail()
    {
        return $this->email;
    }

    //Define o e-mail do cliente.
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    //Retorna a data de nascimento do cliente.
    public function getDataNasc()
    {
        return $this->data_nasc;
    }

    //Define a data de nascimento do cliente.
    public function setDataNasc(DateTime $data_nasc)
    {
        $this->data_nasc = $data_nasc;
    }

    //Retorna a data de cadastro do cliente.
    public function getDataCad()
    {
        return $this->data_cad;
    }

    //Define a data de cadastro do cliente.
    public function setDataCad(DateTime $data_cad)
    {
        $this->data_cad = $data_cad;
    }

    //Retorna o status do cliente.
    public function getAtivo()
    {
        return $this->ativo;
    }

    //Define o status do cliente.
    public function setAtivo(bool $ativo)
    {
        $this->ativo = $ativo;
    }

    //Retorna o identificador do usuário responsável.
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    //Define o identificador do usuário responsável.
    public function setUsuarioId(int $usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }


    /**
     * Insere um novo cliente no banco de dados.
     *
     * Após a inserção, o ID gerado é atribuído ao objeto.
     *
    */
    public function Inserir():bool
    {
        $sql = "INSERT INTO clientes (nome, cpf, telefone, email, data_nasc, data_cad, ativo, usuario_id) values (:nome, :cpf, :telefone, :email, :data_nasc, :data_cad, :ativo, :usuario_id)";

        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":cpf", $this->cpf);
        $cmd->bindValue(":telefone", $this->telefone);
        $cmd->bindValue(":email", $this->email);
        $cmd->bindValue(":data_nasc", $this->data_nasc->format('Y-m-d'));  
        $cmd->bindValue(":data_cad", $this->data_cad->format('Y-m-d'));      
        $cmd->bindValue(":ativo", $this->ativo, PDO::PARAM_BOOL);  
        $cmd->bindValue(":usuario_id", $this->usuario_id);

        if($cmd->execute())
        {
            $this->id = (int)$this->pdo->lastInsertId();
            return true;
        }
        return false;
    }    


    /**
     * Atualiza os dados do cliente no banco de dados.
     *
     * O cliente deve possuir um identificador válido.
     *
    */
    public function Atualizar():bool
    {
        if(!$this->id) return false;
        $sql = "UPDATE clientes set nome = :nome, cpf = :cpf, telefone = :telefone, email = :email, data_nasc = :data_nasc, ativo = :ativo, usuario_id = :usuario_id WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":cpf", $this->cpf);
        $cmd->bindValue(":telefone", $this->telefone);
        $cmd->bindValue(":email", $this->email);
        $cmd->bindValue(":data_nasc", $this->data_nasc->format('Y-m-d'));   
        $cmd->bindValue(":ativo", $this->ativo, PDO::PARAM_BOOL);   
        $cmd->bindValue(":usuario_id", $this->usuario_id, PDO::PARAM_INT);
   
        return $cmd->execute();
    }


    /**
     * Lista todos os clientes cadastrados.
     *
     * Os registros são retornados em ordem decrescente de ID.
     *
    */
    public static function Listar(): array 
    {
        $cmd = obterPdo()->query("SELECT * FROM clientes ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Busca um cliente pelo seu identificador.
     *
     * Caso encontrado, os atributos do objeto são preenchidos
     * com os dados obtidos do banco de dados.
     *
    */
    public function BuscarPorId(int $id): bool 
    {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $id, PDO::PARAM_INT);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);

        if ($dados) 
        {
            $this->id = (int)$dados['id'];
            $this->setNome($dados['nome']);
            $this->setCpf($dados['cpf']);
            $this->setTelefone($dados['telefone']);
            $this->setEmail($dados['email']);
            $this->setDataNasc(new DateTime($dados['data_nasc']));
            $this->setDataCad(new DateTime($dados['data_cad']));
            $this->setAtivo((bool)$dados['ativo']);
            $this->setUsuarioId((int)$dados['usuario_id']);
            return true;
        }
        return false;
    }


    /**
     * Exclui o cliente do banco de dados.
     *
     * O cliente deve possuir um identificador válido.
     *
    */
    public function Excluir():bool
    {
        if(!$this->id) return false;

        $sql = "DELETE FROM clientes WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }
}
?>