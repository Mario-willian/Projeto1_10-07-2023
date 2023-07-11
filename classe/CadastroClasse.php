<?php
//Para conectar-se com o Banco de Dados
require_once "inc/config.php";

//Classe Clientes
class Cadastro{
    
    //inserindo Clientes
    public function inserir_cliente(){
        //Conexão com o banco de dados
        $pdo = new PDO(server,usuario,senha);

            //Preenchendo as variaveis
            $this->cpf = $_POST["cpf"];
            $this->nome = $_POST["nome"];
            $this->usuario = $_POST["usuario"];
            $this->senha = $_POST["senha"];
            $this->endereco = $_POST["endereco"];
            $this->estado = $_POST["estado"];
            $this->telefone = $_POST["telefone"];
            $this->email = $_POST["email"];
            $this->pagamento = "Boleto Bancário";
            
            //Comando SQL com parametros para insercao
            $smtp = $pdo->prepare("insert into cliente(cpf,nome,usuario,senha,endereco,estado,telefone,email,pagamento,ativo) values(:cpf,:nome,:usuario,:senha,:endereco,:estado,:telefone,:email,:pagamento,1) ");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':cpf' => $this->cpf,
                ':nome' => $this->nome,
                ':usuario' => $this->usuario,
                ':senha' => $this->senha,
                ':endereco' => $this->endereco,
                ':estado' => $this->estado,
                ':telefone' => $this->telefone,
                ':email' => $this->email,
                ':pagamento' => $this->pagamento
            ));

            //Criar o comando SQL com parametros para insercao - ENVIANDO NOTIFICAÇÃO INCIAL
            $smtp = $pdo->prepare("INSERT INTO notificacao(codigo, titulo, descricao, cor, ativa, vendedor_cpf, cliente_cpf) VALUES (NULL,:titulo,:descricao,:cor,1,NULL,:cliente_cpf) ");

            //Executar o comando banco de dados passando os valores recebidos
            $smtp->execute(array(
                ':titulo' => 'Seja Bem Vindo!!!',
                ':descricao' => 'Obrigado por usar a nossa plataforma.',
                ':cor' => 'success',
                ':cliente_cpf' => $this->cpf
            ));
           
            //Testar se retornou algum resultado
            if ($smtp->rowCount() > 0) {
                header("location:./");//Retornar para o index.php
            }
    }

    //inserindo Vendedor
    public function inserir_vendedor(){
        //Conexão com o banco de dados
        $pdo = new PDO(server,usuario,senha);

            //Preenchendo as variaveis
            $this->cpf = $_POST["cpf"];
            $this->nome = $_POST["nome"];
            $this->usuario = $_POST["usuario"];
            $this->senha = $_POST["senha"];
            $this->endereco = $_POST["endereco"];
            $this->estado = $_POST["estado"];
            $this->telefone = $_POST["telefone"];
            $this->email = $_POST["email"];
            $this->banco = $_POST["banco"];
            $this->agencia = $_POST["agencia"];
            $this->conta = $_POST["conta"];
            
            //Comando SQL com parametros para insercao
            $smtp = $pdo->prepare("insert into vendedor(cpf,nome,usuario,senha,endereco,estado,telefone,email,banco,agencia,conta,avaliacao,ativo) values(:cpf, :nome,:usuario,:senha,:endereco,:estado,:telefone,:email,:banco,:agencia,:conta,0,1) ");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':cpf' => $this->cpf,
                ':nome' => $this->nome,
                ':usuario' => $this->usuario,
                ':senha' => $this->senha,
                ':endereco' => $this->endereco,
                ':estado' => $this->estado,
                ':telefone' => $this->telefone,
                ':email' => $this->email,
                ':banco' => $this->banco,
                ':agencia' => $this->agencia,
                ':conta' => $this->conta
            ));

            //Criar o comando SQL com parametros para insercao - ENVIANDO NOTIFICAÇÃO INCIAL
            $smtp = $pdo->prepare("INSERT INTO notificacao(codigo, titulo, descricao, cor, ativa, vendedor_cpf, cliente_cpf) VALUES (NULL,:titulo,:descricao,:cor,1,:vendedor_cpf,NULL) ");

            //Executar o comando banco de dados passando os valores recebidos
            $smtp->execute(array(
                ':titulo' => 'Seja Bem Vindo!!!',
                ':descricao' => 'Obrigado por usar a nossa plataforma.',
                ':cor' => 'success',
                ':vendedor_cpf' => $this->cpf
            ));
           
            //Testar se retornou algum resultado
            if ($smtp->rowCount() > 0) {
                header("location:./");//Retornar para o index.php
            }
    }

    //Recriando Uusuário
    public function recriar_cliente(){
        //Criar a conexao com o banco de dados
        $pdo = new PDO(server,usuario,senha);
            
            //Preenchendo as variaveis
            $this->cpf = $_POST["cpf"];
            $this->nome = $_POST["nome"];
            $this->usuario = $_POST["usuario"];
            $this->senha = $_POST["senha"];
            $this->endereco = $_POST["endereco"];
            $this->estado = $_POST["estado"];
            $this->telefone = $_POST["telefone"];
            $this->email = $_POST["email"];
            $this->pagamento = "Boleto Bancário";

            //Comando SQL com parametros para alteração
            $smtp = $pdo->prepare("UPDATE cliente SET nome = :nome, usuario = :usuario, senha = :senha, endereco = :endereco, estado = :estado, telefone = :telefone, email = :email, pagamento = :pagamento, ativo = 1  WHERE cpf = :cpf;");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':nome' => $this->nome,
                ':usuario' => $this->usuario,
                ':senha' => $this->senha,
                ':endereco' => $this->endereco,
                ':estado' => $this->estado,
                ':telefone' => $this->telefone,
                ':email' => $this->email,
                ':pagamento' => $this->pagamento,
                ':cpf' => $this->cpf
            ));

            if ($smtp->rowCount() > 0) {
                header("location:./");//Retornar para o index.php
            }
    }

    //Recriando Uusuário
    public function recriar_vendedor(){
        //Criar a conexao com o banco de dados
        $pdo = new PDO(server,usuario,senha);
            
            //Preenchendo as variaveis
            $this->cpf = $_POST["cpf"];
            $this->nome = $_POST["nome"];
            $this->usuario = $_POST["usuario"];
            $this->senha = $_POST["senha"];
            $this->endereco = $_POST["endereco"];
            $this->estado = $_POST["estado"];
            $this->telefone = $_POST["telefone"];
            $this->email = $_POST["email"];
            $this->banco = $_POST["banco"];
            $this->agencia = $_POST["agencia"];
            $this->conta = $_POST["conta"];

            //Comando SQL com parametros para alteração
            $smtp = $pdo->prepare("UPDATE vendedor SET nome = :nome, usuario = :usuario, senha = :senha, endereco = :endereco, estado = :estado, telefone = :telefone, email = :email, banco = :banco, agencia = :agencia, conta = :conta, ativo = 1  WHERE cpf = :cpf;");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':nome' => $this->nome,
                ':usuario' => $this->usuario,
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

            if ($smtp->rowCount() > 0) {
                header("location:./");//Retornar para o index.php
            }
    }
}
?>