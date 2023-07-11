<?php
//final da página de acordo a atividade que o usuário exerce no momento
//(Verificando se é  Vendedor ou Comprador)
if (empty($_SESSION['usuario']->conta)) {
    echo"<h2 class='footer-wid-title'>Seja um vendedor</h2>
    <p>Comece a cadastrar seus produtos agora mesmo.</p>";
}else{
    echo"<h2 class='footer-wid-title'>Comprar produtos</h2>
    <p>Comece a comprar produtos agora mesmo.</p>";
}