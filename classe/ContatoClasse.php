<?php
//Para conectar-se com o Banco de Dados
require_once "inc/config.php";

//Classe Clientes
class Comentario{
    
    //meteodo para inserir Comentarios
    public function inserir_comentario(){
        //criar a conexao com o banco de dados
        $pdo = new PDO(server,usuario,senha);
            //preencher os atributos com os valores recebidos
            $this->nome = $_GET["nome"];
            $this->email = $_GET["email"];
            $this->telefone = $_GET["telefone"];
            $this->mensagem = $_GET["mensagem"];

            //Criar o comando SQL com parametros para insercao
            $smtp = $pdo->prepare("INSERT INTO comentarios(id,nome,email,telefone,mensagem) VALUES(null,:nome,:email,:telefone,:mensagem) ");

            //Executar o comando banco de dados passando os valores recebidos
            $smtp->execute(array(
                ':nome' => $this->nome,
                ':email' => $this->email,
                ':telefone' => $this->telefone,
                ':mensagem' => $this->mensagem
            ));

            //Testar se retornou algum resultado
            if ($smtp->rowCount() > 0) {
                header("location:contato.php");//Atualizar a pagina
            }
    }
}
?>