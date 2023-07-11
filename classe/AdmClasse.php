<?php
//Para conectar-se com o Banco de Dados
require_once "../inc/config.php";

//Classe Clientes
class Adm{

    //inserindo Vendedor
    public function inserir_adm(){
        //Conexão com o banco de dados
        $pdo = new PDO(server,usuario,senha);

            //Preenchendo as variaveis
            $this->nome = $_GET["nome"];
            $this->login = $_GET["login"];
            $this->senha = $_GET["senha"];
            
            //Comando SQL com parametros para insercao
            $smtp = $pdo->prepare("INSERT INTO adm(nome,login,senha) VALUES(:nome,:login,:senha) ");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':nome' => $this->nome,
                ':login' => $this->login,
                ':senha' => $this->senha
            ));
           
            //Testar se retornou algum resultado
            if ($smtp->rowCount() > 0) {
                header("location:./");//Retornar para o index.php
            }
    }

    

}
?>