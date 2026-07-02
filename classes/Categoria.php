<?php
include_once "config/conexao.php";

class Categoria
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

    public static function Listar():array
    {
        $cmd = obterPdo()->query("select * from categorias order by id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function BuscarPorId(int $id):bool
    {
        $sql = "SELECT * FROM categorias WHERE id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
           
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
        $sql = "UPDATE categorias
                set nome = :nome, sigla = :sigla
                WHERE id = :id";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);        $cmd->bindValue(":nome", $this->nome);   
        $cmd->bindValue(":sigla", $this->sigla);   
        return $cmd->execute();
    }

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