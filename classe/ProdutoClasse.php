<?php
//Para conectar-se com o Banco de Dados
require_once "../inc/config.php";

//Classe Clientes
class Produto{
    
    //inserindo Produto
    public function inserir_produto(){

        //Conexão com o banco de dados
        $pdo = new PDO(server,usuario,senha);

            //Preenchendo as variaveis
            $this->nome = $_POST["nome"];
            $this->tipo = $_POST["tipo"];
            $this->valor = $_POST["valor"];
            $this->vendedor_cpf = $_POST["vendedor_cpf"];
            $this->quantidade = $_POST["quantidade"];

            

            $pasta = "imagens_vendedor/";
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $pasta.$_FILES['arquivo']['name']);


            //Comando SQL com parametros para insercao de produtos
            $smtp = $pdo->prepare("INSERT INTO produto(id,nome,tipo,valor,vendedor_cpf,foto) VALUES(null,:nome,:tipo,:valor,:vendedor_cpf,:foto) ");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':nome' => $this->nome,
                ':tipo' => $this->tipo,
                ':valor' => $this->valor,
                ':vendedor_cpf' => $this->vendedor_cpf,
                ':foto' => $_FILES['arquivo']['name']
            ));

            //Selecionando a ID do compra_venda que acaba de ser feita no insert anterior
            $vendedor_cpf = $_POST["vendedor_cpf"];
            $select = $pdo->query("SELECT * FROM produto where vendedor_cpf ='".$vendedor_cpf."' ORDER BY id DESC limit 1");
            $result = $select->fetch(PDO::FETCH_ASSOC);
            $this->produto_id = $result['id'];

            //Comando SQL com parametros para insercao de produtos
            $smtp = $pdo->prepare("insert into estoque(id,quantidade,produto_id,vendedor_cpf) values(null,:quantidade,:produto_id,:vendedor_cpf) ");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':quantidade' => $this->quantidade,
                ':produto_id' => $this->produto_id,
                ':vendedor_cpf' => $this->vendedor_cpf
            ));

            //Criar o comando SQL com parametros para insercao - ENVIANDO NOTIFICAÇÃO SOBRE A INSERÇÃO DO PRODUTO
            $smtp = $pdo->prepare("INSERT INTO notificacao(codigo, titulo, descricao, cor, ativa, vendedor_cpf, cliente_cpf) VALUES (NULL,:titulo,:descricao,:cor,1,:vendedor_cpf,NULL) ");

            //Executar o comando banco de dados passando os valores recebidos
            $smtp->execute(array(
                ':titulo' => 'Tudo Certo!',
                ':descricao' => 'Boaaa! O seu produto acaba de ser anunciado em nossa loja virtual!',
                ':cor' => 'success',
                ':vendedor_cpf' => $this->vendedor_cpf
            ));

            //Testar se retornou algum resultado
            if ($smtp->rowCount() > 0) {
                header("location:estoque.php");//Retornar para o index.php
            }
    }

    //Alterar Produto
    public function alterar_estoque(){

        //Conexão com o banco de dados
        $pdo = new PDO(server,usuario,senha);
            
            //Preenchendo as variaveis
            $this->codigo_produto = $_GET["codigo"];
            $this->quantidade = $_GET["quantidade"];

            //Criar o comando sql
            $smtp = $pdo->prepare("update estoque_vendedor set quantidade = :quantidade where codigo_produto = :codigo_produto");

            //Executar no banco passando os valores recebidos como parametros
            $smtp->execute(array(
                ':codigo_produto' => $this->codigo_produto,
                ':quantidade' => $this->quantidade
            ));

            //Testar se retornou algum resultado
            if ($smtp->rowCount() > 0) {
                header("location:estoque.php");//Retornar para o index.php
            }
        }
    
    //inserindo Venda
    public function inserir_venda(){
        //Info para o boleto
        $_SESSION['valor_compra'] = 0;
        $_SESSION['quantidade'] = 0;
        //Puxando Sessao
        foreach ($_SESSION['carrinho'] as $codigo => $qtd)  {
        
        //Conexão com o banco de dados
        $pdo = new PDO(server,usuario,senha);

            //Puxando um entregador aleatório
            $select = $pdo->query("SELECT * FROM entregador ORDER BY rand() LIMIT 1");
            $result = $select->fetch(PDO::FETCH_ASSOC);

            //Preenchendo as variaveis
            $this->data = $_GET["data".$codigo];
            $this->hora = $_GET["hora".$codigo];
            $this->valor = $_GET["valor".$codigo] * $_GET["quantidade".$codigo];
            $this->tp_pagamento = "Boleto";
            $this->cliente_cpf = $_GET["cliente_cpf".$codigo];
            $this->vendedor_cpf = $_GET["vendedor_cpf".$codigo];
            $this->entregador_cpf = $result['cpf'];
            $this->quantidade = $_GET["quantidade".$codigo];
            $this->produto_id = $_GET["produto_id".$codigo];
            $this->codigo_estoque = $_GET["codigo_estoque".$codigo];

            //Comando SQL com parametros para insercao de Compra_venda
            $smtp = $pdo->prepare("INSERT INTO compra_venda(id,data,hora,valor,tp_pagamento,vendedor_cpf,cliente_cpf,entregador_cpf,status) VALUES(null,:data,:hora,:valor,:tp_pagamento,:vendedor_cpf,:cliente_cpf,:entregador_cpf,2) ");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':data' => $this->data,
                ':hora' => $this->hora,
                ':valor' => $this->valor,
                ':tp_pagamento' => $this->tp_pagamento,
                ':vendedor_cpf' => $this->vendedor_cpf,
                ':cliente_cpf' => $this->cliente_cpf,
                ':entregador_cpf' => $this->entregador_cpf
            ));

            //Selecionando a ID do compra_venda que acaba de ser feita no insert anterior
            $cliente_cpf = $_GET["cliente_cpf".$codigo];
            $select = $pdo->query("SELECT * FROM compra_venda WHERE cliente_cpf ='".$cliente_cpf."' ORDER BY id DESC limit 1");
            $result = $select->fetch(PDO::FETCH_ASSOC);
            $this->compra_venda_id = $result['id'];
            
            //Comando SQL com parametros para insercao de Itens_venda
            $smtp = $pdo->prepare("INSERT INTO item_venda(id,quantidade,produto_id,compra_venda_id) VALUES(null,:quantidade,:produto_id,:compra_venda_id) ");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':quantidade' => $this->quantidade,
                ':produto_id' => $this->produto_id,
                ':compra_venda_id' => $this->compra_venda_id
            ));      

            //Comando SQL com parametros para insercao de Compra_venda
            $smtp = $pdo->prepare("UPDATE estoque SET quantidade = quantidade - :quant WHERE id =  :codigo_estoque");
            //Passando os valores recebidos
            $smtp->execute(array(
                ':quant' => $this->quantidade,
                ':codigo_estoque' => $this->codigo_estoque
            ));      

            //Criar o comando SQL com parametros para insercao - ENVIANDO NOTIFICAÇÃO SOBRE A VENDA DO PRODUTO
            $smtp = $pdo->prepare("INSERT INTO notificacao(codigo, titulo, descricao, cor, ativa, vendedor_cpf, cliente_cpf) VALUES (NULL,:titulo,:descricao,:cor,1,:vendedor_cpf,NULL) ");

            //Executar o comando banco de dados passando os valores recebidos
            $smtp->execute(array(
                ':titulo' => 'Vendido!!',
                ':descricao' => 'Dinheiro no bolso. O seu produto acaba de ser comprado em nossa loja virtual!',
                ':cor' => 'success',
                ':vendedor_cpf' => $this->vendedor_cpf
            ));
            $_SESSION['valor_compra'] += $_GET["valor".$codigo];
            $_SESSION['quantidade'] += $_GET["quantidade".$codigo];
            unset($_SESSION['carrinho']);
        }

    }

    //Alterar Produto
    public function atualizar_status(){

        //Conexão com o banco de dados
        $pdo = new PDO(server,usuario,senha);
            
            //Preenchendo as variaveis
            $this->id = $_POST["id"];

            //Criar o comando sql
            $smtp = $pdo->prepare("update compra_venda set status = 1 where id = :id");

            //Executar no banco passando os valores recebidos como parametros
            $smtp->execute(array(
                ':id' => $this->id
            ));

            //Testar se retornou algum resultado
            if ($smtp->rowCount() > 0) {
                header("location:historico.php");//Retornar para o index.php
            }
        }

}
?>