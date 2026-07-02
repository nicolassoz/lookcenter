<?php
include_once "config/conexao.php";

class Usuario
{
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private int $nivel_id;
    private bool $ativo;
    private PDO $pdo;

    public function __construct()
    {
       $this->pdo = obterPdo();
    }
    
    public function getId()
    {
        return $this->id;
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

    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    public function getNivelId()
    {
        return $this->nivel_id;
    }
    public function setNivelId(int $nivel_id)
    {
        $this->nivel_id = $nivel_id;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }
    public function setAtivo(bool $ativo)
    {
        $this->ativo = $ativo;
    }

    public static function EfetuarLogin(string $email, string $senha):array
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email AND ativo = b'1'";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":email", $email);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);

        if($dados && password_verify($senha, $dados['senha']))
        {
            return $dados;
        }
        else
        {
            return $dados = [];    
        }
    }

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

    public static function Listar():array
    {
        $cmd = obterPdo()->query("select * from usuarios order by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

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
            $this->setAtivo(ord($dados['ativo']) == 1 ? true : false);

            return true;
        }
        return false;
    }

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
            $this->setAtivo(ord($dados['ativo']) == 1 ? true : false);

            return true;
        }
        return false;
    }

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

    public function AtualizarSenha(string $senhaHash):bool
    {
        if(!$this->id) return false;

        $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":senha", password_hash($senhaHash, PASSWORD_DEFAULT));
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

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