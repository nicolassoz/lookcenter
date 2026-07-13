<?php
include_once "config/conexao.php";

//Classe responsável pelo gerenciamento dos endereços dos clientes.
class Endereco
{
    //Identificador único do endereço.
    private int $id_endereco;
    
    //Identificador do cliente ao qual o endereço pertence.
    private int $cliente_id;
    
    //CEP do endereço.
    private string $cep;
    
    //Nome do logradouro.
    private string $logradouro;
    
    //Número do endereço.
    private string $numero;
    
    //Complemento do endereço.
    private ?string $complemento = null;
    
    //Bairro do endereço.
    private string $bairro;
    
    //Cidade do endereço.
    private string $cidade;
    
    //Unidade Federativa (UF) do endereço.
    private string $uf;
    
    //Objeto responsável pela conexão com o banco de dados.
    private PDO $pdo;

    /**
     * Construtor da classe.
     *
     * Inicializa a conexão com o banco de dados utilizando PDO.
    */
    public function __construct()
    {
        $this->pdo = obterPdo();
    }

    //Retorna o identificador do endereço.
    public function getId()
    {
        return $this->id_endereco;
    }

    //Retorna o identificador do cliente.
    public function getClienteId()
    {
        return $this->cliente_id;
    }

    //Define o identificador do cliente.
    public function setClienteId(int $cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    //Retorna o CEP do endereço.
    public function getCep()
    {
        return $this->cep;
    }

    //Define o CEP do endereço.
    public function setCep(string $cep)
    {
        $this->cep = $cep;
    }

    //Retorna o logradouro.
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    //Define o logradouro.
    public function setLogradouro(string $logradouro)
    {
        $this->logradouro = $logradouro;
    }

    //Retorna o número do endereço.
    public function getNumero()
    {
        return $this->numero;
    }

    //Define o número do endereço.
    public function setNumero(string $numero)
    {
        $this->numero = $numero;
    }

    //Retorna o complemento do endereço.
    public function getComplemento()
    {
        return $this->complemento;
    }

    //Define o complemento do endereço.
    public function setComplemento(?string $complemento)    
    {
        $this->complemento = $complemento;
    }

    //Retorna o bairro do endereço.
    public function getBairro()
    {
        return $this->bairro;
    }

    //Define o bairro do endereço.
    public function setBairro(string $bairro)
    {
        $this->bairro = $bairro;
    }

    //Retorna a cidade do endereço.
    public function getCidade()
    {
        return $this->cidade;
    }

    //Define a cidade do endereço.
    public function setCidade(string $cidade)
    {
        $this->cidade = $cidade;
    }
    
    //Retorna a Unidade Federativa (UF).
    public function getUf()
    {
        return $this->uf;
    }

    //Define a Unidade Federativa (UF).
    public function setUf(string $uf)
    {
        $this->uf = $uf;
    }


    /**
     * Insere um novo endereço no banco de dados.
     *
     * Após a inserção, o ID gerado é atribuído ao objeto.
     *
    */
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


    /**
     * Lista todos os endereços cadastrados.
     *
     * Os registros são retornados em ordem decrescente do cliente.
     *
    */
    public static function Listar():array
    {
        $cmd = obterPdo()->query("SELECT * FROM enderecos ORDER BY id DESC");
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Busca um endereço pelo seu identificador.
     *
     * Caso encontrado, os atributos do objeto são preenchidos
     * com os dados obtidos do banco de dados.
     *
    */
    public function BuscarPorId(int $id):bool
    {
        $sql = "SELECT * FROM enderecos WHERE id_endereco = :id_endereco";
        $cmd = obterPdo()->prepare($sql);
        $cmd->bindValue(":id_endereco", $id, PDO::PARAM_INT);
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        $cmd->execute();

        if($dados)
        {
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


    /**
     * Atualiza os dados do endereço no banco de dados.
     *
     * O endereço deve possuir um identificador válido.
     *
    */
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


    /**
     * Exclui o endereço do banco de dados.
     *
     * O endereço deve possuir um identificador válido.
     *
    */
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