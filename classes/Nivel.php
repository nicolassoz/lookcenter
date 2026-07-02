<?php
include_once "config/conexao.php";

class Nivel
{
    private int $id;
    private string $nome;
    private string $sigla;
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

    public function getSigla()
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla)
    {
         $this->sigla = $sigla;
    }

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

    public static function Listar():array
    {
        $cmd = obterPdo()->query("select * from niveis order by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

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