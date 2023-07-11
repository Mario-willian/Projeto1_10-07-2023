<?php
//Para conectar-se com o Banco de Dados
require_once "../inc/config.php";

//Classe Notificacao
class Notificacao{
    //Atributos da classe(campos da tabela cargo)
    public $codigo;

    //meteodo para inserir Comentarios
    public function inserir(){
        //criar a conexao com o banco de dados
        $pdo = new PDO(server,usuario,senha);

        //Recendo a variavel que recebe  nome da tabela
        $tabela = $_GET["tabela"];

        //Puxando variável para o select
        require_once '../inc/conexao.php';

            //Verificando o cpf do destinatário da notificação
                if ($tabela == "cliente") {
                    //Select para apresentar todos os clientes
                    $result_notificacao = "SELECT * FROM cliente WHERE ativo=1;";
                    $resultado_notificacao = mysqli_query($conn, $result_notificacao);
                    $row_notificacao = mysqli_num_rows ($resultado_notificacao);
                }else{
                    //Select para apresentar todos os Vendedores
                    $result_notificacao = "SELECT * FROM vendedor WHERE ativo=1;";
                    $resultado_notificacao = mysqli_query($conn, $result_notificacao);
                    $row_notificacao = mysqli_num_rows ($resultado_notificacao);
                }

            //preencher os atributos com os valores UNICOS, recebidos
            $this->titulo = $_GET["titulo"];
            $this->descricao = $_GET["descricao"];
            $this->cor = $_GET["cor"];

            //Loop até enviar para todos os usuários
            while ($rows_notificacao = mysqli_fetch_assoc($resultado_notificacao)){ 

            //preencher os atributos com os valores ALTERNADOS, recebidos
            if ($tabela == "cliente") {
                $this->vendedor_cpf = NULL;
                $this->cliente_cpf = $rows_notificacao['cpf'];
            }else{
                $this->vendedor_cpf = $rows_notificacao['cpf'];
                $this->cliente_cpf = NULL;
            }
            
            

            //Criar o comando SQL com parametros para insercao
            $smtp = $pdo->prepare("INSERT INTO notificacao(codigo, titulo, descricao, cor, ativa, vendedor_cpf, cliente_cpf) VALUES (NULL,:titulo,:descricao,:cor,1,:vendedor_cpf,:cliente_cpf) ");

            //Executar o comando banco de dados passando os valores recebidos
            $smtp->execute(array(
                ':titulo' => $this->titulo,
                ':descricao' => $this->descricao,
                ':cor' => $this->cor,
                ':vendedor_cpf' => $this->vendedor_cpf,
                ':cliente_cpf' => $this->cliente_cpf
            ));            
        }
        //Testar se retornou algum resultado
            if ($smtp->rowCount() > 0) {
                header("location:inserir.php");//Atualizar a pagina
            }
    }

    //Metodo para Excluir
    public function excluir($codigo){
        //Criar a conexao com o banco de dados
            $pdo = new PDO(server,usuario,senha);
            
        //Verificar se recebeu o codigo par aexcluir
            $this->codigo = $codigo;
            
            //Criar o comando sql
            $smtp = $pdo->prepare("UPDATE notificacao set ativa = 0 where codigo = :codigo");
            //Executar o comando no banco de dados passando os valroes por parametros
            $smtp->execute(array(
                ':codigo' => $this->codigo
            ));
    }
}
?>