<?php
//Para conectar-se com o Banco de Dados
require_once "../inc/config.php";

//Classe Clientes
class Avaliacao{
    
    //inserindo Clientes
    public function inserir_avaliacao(){
        //Conexão com o banco de dados
        $pdo = new PDO(server,usuario,senha);

            //Preenchendo as variaveis
            $this->numero = $_POST["estrela"];
            $this->vendedor_cpf = $_POST["vendedor_cpf"];
            $this->id = $_POST["id"];
            
            //Comando SQL com parametros para insercao
            $smtp = $pdo->prepare("insert into avaliacao(id,numero,vendedor_cpf) values(null,:numero,:vendedor_cpf);");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':numero' => $this->numero,
                ':vendedor_cpf' => $this->vendedor_cpf
            ));

            //Criar o comando sql
            $smtp = $pdo->prepare("update compra_venda set status = 0 where id = :id");

            //Executar no banco passando os valores recebidos como parametros
            $smtp->execute(array(
                ':id' => $this->id
            ));

                //Select para apresentar a média de avaliação
                    $vendedor_cpf = $_POST["vendedor_cpf"];
                    $select = $pdo->query("SELECT avg(numero) FROM avaliacao where vendedor_cpf ='".$vendedor_cpf."'");
                    $result = $select->fetch(PDO::FETCH_ASSOC);
                    $this->nova_avaliacao = $result['avg(numero)'];

            //Criar o comando sql
            $smtp = $pdo->prepare("update vendedor set avaliacao = :avaliacao where cpf = :vendedor_cpf");

            //Executar no banco passando os valores recebidos como parametros
            $smtp->execute(array(
                ':avaliacao' => $this->nova_avaliacao,
                ':vendedor_cpf' => $this->vendedor_cpf
            ));

            //FAZER A MEDIA DE AVALIACAO DO VENDEDOR
           
            //Testar se retornou algum resultado
            if ($smtp->rowCount() > 0) {
                header("location:historico.php");//Retornar para o index.php
            }
    }
}
?>