<?php
include_once "config/conexao.php";

class Endereco
{
    private int $id_endereco;
    private int $cliente_id;
    private string $cep;
    private string $logradouro;
    private string $numero;
    private ?string $complemento = null;
    private string $bairro;
    private string $cidade;
    private string $uf;
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = obterPdo();
    }

    public function getId()
    {
        return $this->id_endereco;
    }

    public function getClienteId()
    {
        return $this->cliente_id;
    }

    public function setClienteId(int $cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep(string $cep)
    {
        $this->cep = $cep;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function setLogradouro(string $logradouro)
    {
        $this->logradouro = $logradouro;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero(string $numero)
    {
        $this->numero = $numero;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento)    
    {
        $this->complemento = $complemento;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro)
    {
        $this->bairro = $bairro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade)
    {
        $this->cidade = $cidade;
    }
    
    public function getUf()
    {
        return $this->uf;
    }

    public function setUf(string $uf)
    {
        $this->uf = $uf;
    }

    public function Inserir():bool
    {
        $sql = "INSERT INTO enderecos (cliente_id, cep, logradouro, numero, complemento, bairro, cidade, uf) values (:cliente_id, :cep, :logradouro, :numero, :complemento, :bairro, :cidade, :uf)";

        $cmd = $this->pdo->prepare($sql);

        $cmd->bindValue(":cliente_id", $this->cliente_id);
        $cmd->bindValue(":cep", $this->cep);
        $cmd->bindValue(":logradouro", $this->logradouro);
        $cmd->bindValue(":numero", $this->numero);
        $cmd->bindValue(":complemento", $this->complemento);
        $cmd->bindValue(":bairro", $this->bairro);
        $cmd->bindValue(":cidade", $this->cidade);
        $cmd->bindValue(":uf", $this->uf);  

        if($cmd->execute())
        {
            $this->id_endereco = (int)$this->pdo->lastInsertId();
            return true;
        }
        return false;
    }    

    public static function ListarPorCliente():array
    {
        $cmd = obterPdo()->query("select * from enderecos order by cliente_id desc");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function BuscarPorId(int $id):bool
    {
        $sql = "SELECT * FROM enderecos WHERE id_endereco = :id_endereco";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id_endereco", $id, PDO::PARAM_INT);
        
        $cmd->execute();
        if($cmd->rowCount() > 0)
        {
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);
           
            $this->id_endereco = (int)$dados['id_endereco'];
            $this->setClienteId((int)$dados['cliente_id']);
            $this->setCep($dados['cep']);
            $this->setLogradouro($dados['logradouro']);
            $this->setNumero($dados['numero']);
            $this->setComplemento($dados['complemento']);
            $this->setBairro($dados['bairro']);
            $this->setCidade($dados['cidade']);
            $this->setUf($dados['uf']);
            return true;
        }
        return false;
    }

    public function Atualizar():bool
    {
        if(!$this->id_endereco) return false;
        $sql = "UPDATE enderecos
                set cliente_id = :cliente_id, cep = :cep, logradouro = :logradouro, 
                numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, uf = :uf
                WHERE id_endereco = :id_endereco";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_endereco", $this->id_endereco, PDO::PARAM_INT);        
        $cmd->bindValue(":cliente_id", $this->cliente_id, PDO::PARAM_INT);   
        $cmd->bindValue(":cep", $this->cep);   
        $cmd->bindValue(":logradouro", $this->logradouro);
        $cmd->bindValue(":numero", $this->numero);
        $cmd->bindValue(":complemento", $this->complemento);
        $cmd->bindValue(":bairro", $this->bairro);
        $cmd->bindValue(":cidade", $this->cidade);
        $cmd->bindValue(":uf", $this->uf);

        return $cmd->execute();
    }

    public function Excluir():bool
    {
        if(!$this->id_endereco) return false;

        $sql = "DELETE FROM enderecos WHERE id_endereco = :id_endereco";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id_endereco", $this->id_endereco, PDO::PARAM_INT);

        return $cmd->execute();
    }
}
?>