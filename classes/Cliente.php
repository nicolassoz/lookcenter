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
    private PDO $pdo;
    private int $usuario_id;

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

    public function inserir(): bool 
    {
        $sql = "INSERT INTO clientes (usuario_id, telefone, cpf)
                VALUES (:usuario_id, :telefone, :cpf)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":usuario_id", $this->usuario_id, PDO::PARAM_INT);
        $cmd->bindValue(":telefone", $this->telefone);
        $cmd->bindValue(":cpf", $this->cpf);

        if ($cmd->execute())
        {
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }

    public function atualizar(): bool 
    {
        if (!$this->id) return false;

        $sql = "UPDATE clientes 
                SET telefone = :telefone, cpf = :cpf
                WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);
        $cmd->bindValue(":telefone", $this->telefone);
        $cmd->bindValue(":cpf", $this->cpf);
        return $cmd->execute();
    }

    public static function listar(): array 
    {
        $cmd = obterPdo()->query("SELECT * FROM clientes ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id): bool 
    {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id", $id, PDO::PARAM_INT);
        $cmd->execute();

        if ($cmd->rowCount() > 0) {
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            $this->id = $dados["id"];
            $this->usuario_id = $dados["usuario_id"];
            $this->telefone = $dados["telefone"];
            $this->cpf = $dados["cpf"];
            return true;
        }
        return false;
    }

    public function buscarPorUsuario(int $usuario_id): bool 
    {
        $sql = "SELECT * FROM clientes WHERE usuario_id = :usuario_id LIMIT 1";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":usuario_id", $usuario_id, PDO::PARAM_INT);
        $cmd->execute();
        
        if ($cmd->rowCount() > 0) {
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
            $this->id = $dados["id"];
            $this->usuario_id = $dados["usuario_id"];
            $this->telefone = $dados["telefone"];
            $this->cpf = $dados["cpf"];
            return true;
        }
        return false;
    }

    public function excluir():bool
    {
        if(!$this->id) return false;

        $sql = "DELETE FROM clientes WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }
}
?>