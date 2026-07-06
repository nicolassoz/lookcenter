<?php
include_once "config/conexao.php";

class Cliente
{
    private int $id;
    private string $nome;
    private string $cpf;
    private string $telefone;
    private string $email;
    private DateTime $data_nasc;
    private DateTime $data_cad;
    private bool $ativo;
    private int $usuario_id;
    private PDO $pdo;    

    public function __construct()
    {
        $this->pdo = obterPdo();
        $this->data_cad = new DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getDataNasc()
    {
        return $this->data_nasc;
    }
    public function setDataNasc(DateTime $data_nasc)
    {
        $this->data_nasc = $data_nasc;
    }

    public function getDataCad()
    {
        return $this->data_cad;
    }
    public function setDataCad(DateTime $data_cad)
    {
        $this->data_cad = $data_cad;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }
    public function setAtivo(bool $ativo)
    {
        $this->ativo = $ativo;
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function setUsuarioId(int $usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

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

    public static function Listar(): array 
    {
        $cmd = obterPdo()->query("SELECT * FROM clientes ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function BuscarPorId(int $id): bool 
    {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $id, PDO::PARAM_INT);
        $cmd->execute();

        if ($cmd->rowCount() > 0) 
        {
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

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