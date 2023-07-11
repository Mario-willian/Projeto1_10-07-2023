<?php
//Para conectar-se com o Banco de Dados
require_once "../inc/config.php";

//Classe Clientes
class Conta{
    //Atributos da classe
    public $cpf;
    public $nome;
    public $usuario;
    public $senha;
    public $endereco;
    public $estado;
    public $telefone;
    public $email;
    public $pagamento;
    public $banco;
    public $agencia;
    public $codigo;
    public $conta;

    //Alterando Clientes
    public function alterar_cliente(){
        //Criar a conexao com o banco de dados
        $pdo = new PDO(server,usuario,senha);
            
            //Preenchendo as variaveis
            $this->cpf = $_GET["cpf"];
            $this->nome = $_GET["nome"];
            $this->senha = $_GET["senha"];
            $this->endereco = $_GET["endereco"];
            $this->estado = $_GET["estado"];
            $this->telefone = $_GET["telefone"];
            $this->email = $_GET["email"];
            $this->pagamento = $_GET["pagamento"];

            //Comando SQL com parametros para alteração
            $smtp = $pdo->prepare("UPDATE cliente SET nome = :nome, senha = :senha, endereco = :endereco, estado = :estado, telefone = :telefone, email = :email, pagamento = :pagamento  WHERE cpf = :cpf;");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':nome' => $this->nome,
                ':senha' => $this->senha,
                ':endereco' => $this->endereco,
                ':estado' => $this->estado,
                ':telefone' => $this->telefone,
                ':email' => $this->email,
                ':pagamento' => $this->pagamento,
                ':cpf' => $this->cpf
            ));
            //Sinalização de Sucesso
            $_SESSION['conclusao']= "<div class='alert alert-success text-center'>Alterações feitas com sucesso!</div>";

        //REFAZENDO A SESSION(PARA EVITAR ERRO)
        unset($_SESSION['usuario']);
        //Select´s
        $sql = $pdo->prepare("SELECT * FROM cliente WHERE usuario=?");
        $sql->execute( array($_GET["usuario"] ) );
        $row = $sql->fetchObject();  // devolve um único registro

        $sql = $pdo->prepare("SELECT * FROM vendedor WHERE usuario=?");
        $sql->execute( array($_GET["usuario"] ) );
        $row2 = $sql->fetchObject();  // devolve um único registro

        if ($row) { 
            //Caso o usuário seja cliente
            $_SESSION['usuario'] = $row;
        }else if($row2){
            //Caso o usuário seja vendedor
            $_SESSION['usuario'] = $row2;
        }
    }

    //Alterando Vendedor
    public function alterar_vendedor(){
        //Criar a conexao com o banco de dados
        $pdo = new PDO(server,usuario,senha);
            
            //Preenchendo as variaveis
            $this->cpf = $_GET["cpf"];
            $this->nome = $_GET["nome"];
            $this->senha = $_GET["senha"];
            $this->endereco = $_GET["endereco"];
            $this->estado = $_GET["estado"];
            $this->telefone = $_GET["telefone"];
            $this->email = $_GET["email"];
            $this->banco = $_GET["banco"];
            $this->agencia = $_GET["agencia"];
            $this->conta = $_GET["conta"];

            //Comando SQL com parametros para alteração
            $smtp = $pdo->prepare("UPDATE vendedor SET nome = :nome, senha = :senha, endereco = :endereco, estado = :estado, telefone = :telefone, email = :email, banco = :banco, agencia = :agencia, conta = :conta  WHERE cpf = :cpf;");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':nome' => $this->nome,
                ':senha' => $this->senha,
                ':endereco' => $this->endereco,
                ':estado' => $this->estado,
                ':telefone' => $this->telefone,
                ':email' => $this->email,
                ':banco' => $this->banco,
                ':agencia' => $this->agencia,
                ':conta' => $this->conta,
                ':cpf' => $this->cpf
            ));
            //Sinalização de Sucesso
            $_SESSION['conclusao']= "<div class='alert alert-success text-center'>Alterações feitas com sucesso!</div>";

        //REFAZENDO A SESSION(PARA EVITAR ERRO)
        unset($_SESSION['usuario']);
        //Select´s
        $sql = $pdo->prepare("SELECT * FROM cliente WHERE usuario=?");
        $sql->execute( array($_GET["usuario"] ) );
        $row = $sql->fetchObject();  // devolve um único registro

        $sql = $pdo->prepare("SELECT * FROM vendedor WHERE usuario=?");
        $sql->execute( array($_GET["usuario"] ) );
        $row2 = $sql->fetchObject();  // devolve um único registro

        if ($row) { 
            //Caso o usuário seja cliente
            $_SESSION['usuario'] = $row;
            header("location:conta.php");
        }else if($row2){
            //Caso o usuário seja vendedor
            $_SESSION['usuario'] = $row2;
            header("location:conta.php");
        }
    }

    //Excluindo Clientes
    public function excluir_cliente($cpf){
        //Criar a conexao com o banco de dados
            $pdo = new PDO(server,usuario,senha);
            
        //Verificar se recebeu o codigo par aexcluir
            $this->cpf = $cpf;
            
            //Criar o comando sql
            $smtp = $pdo->prepare("UPDATE cliente set ativo = 0 where cpf = :cpf");
            //Executar o comando no banco de dados passando os valroes por parametros
            $smtp->execute(array(
                ':cpf' => $this->cpf
            ));
    }

    //Excluindo Vendedor
    public function excluir_vendedor($cpf){
        //Criar a conexao com o banco de dados
            $pdo = new PDO(server,usuario,senha);
            
        //Verificar se recebeu o codigo par aexcluir
            $this->cpf = $cpf;
            
            //Criar o comando sql
            $smtp = $pdo->prepare("UPDATE vendedor set ativo = 0 where cpf = :cpf");
            //Executar o comando no banco de dados passando os valroes por parametros
            $smtp->execute(array(
                ':cpf' => $this->cpf
            ));
    }    
}
?>