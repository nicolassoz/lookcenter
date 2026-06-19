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
    private bool $primeiro_login;
    private PDO $pdo;

        public function __construct(){
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

    public function getPrimeiroLogin()
    {
        return $this->primeiro_login;
    }
    public function setPrimeiroLogin(bool $primeiro_login)
    {
        $this->primeiro_login = $primeiro_login;
    }

    public static function efetuarLogin(string $email, string $senha):array
    {
        $sql = "select * from usuarios where email = :email and ativo = b'1'";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":email", $email);
        $cmd->execute();
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        if($dados && password_verify($senha, $dados['senha'])){
            return $dados;
        }else{
            return $dados = [];    
        }
    }

    public function inserir():bool
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
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }    

    public static function listar():array
    {
        $cmd = obterPdo()->query("select * from usuarios order by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorEmail(string $email):bool
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":email",$email);
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
           
            $this->id = $dados['id'];
            $this->setNome($dados['nome']);
            $this->setEmail($dados['email']);
            $this->setSenha($dados['senha']);
            $this->setNivelId($dados['nivel_id']);
            $this->setAtivo($dados['ativo']);
            $this->primeiro_login = $dados['primeiro_login'];
            return true;
        }
        return false;
    }

    public function buscarPorId(int $id):bool
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
           
            $this->id = $dados['id'];
            $this->setNome($dados['nome']);
            $this->setEmail($dados['email']);
            $this->setSenha($dados['senha']);
            $this->setNivelId($dados['nivel_id']);
            $this->setAtivo($dados['ativo']);
            $this->primeiro_login = $dados['primeiro_login'];
            return true;
        }
        return false;
    }

    public function atualizar():bool
    {
        if(!$this->id) return false;
        $sql = "UPDATE usuarios
                set nome = :nome, email = :email, nivel_id = :nivel_id, ativo = :ativo,
                primeiro_login = :primeiro_login
                WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id); 
        $cmd->bindValue(":nome", $this->nome);   
        $cmd->bindValue(":email", $this->email);   
        $cmd->bindValue(":nivel_id", $this->nivel_id);   
        $cmd->bindValue(":ativo", $this->ativo, PDO::PARAM_BOOL);   
        $cmd->bindValue(":primeiro_login", $this->primeiro_login, PDO::PARAM_BOOL);   
        return $cmd->execute();
    }

public function atualizarSenha(string $senhaHash):bool
    {
        if(!$this->id) return false;

        $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":senha", $senhaHash);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

    public function excluir():bool
    {
        if(!$this->id) return false;

        $sql = "DELETE FROM usuarios WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

}
?>