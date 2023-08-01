// Recuperar do HTML o SELETOR cad-ferias-form com JavaScript
const cadferiasForm = document.getElementById("cad-ferias-form");

// Verificar se a constante cadferiasForm é TRUE
if (cadferiasForm) {

    // Aguardar e identificar o clique do usuário no botão cadstrar com JavaScript
    cadferiasForm.addEventListener("submit", async (e) => {

        // Bloquear o recarregamento da página com JavaScript
        e.preventDefault();

        // Receber os dados do formulário com JavaScript
        const dadosForm = new FormData(cadferiasForm);

        // Enviar os dados do JavaScript para o PHP
        const dados = await fetch("../classes/inserts/ferias.php", {
            method: "POST", // Enviar os dados do JavaScript para o PHP através do método POST
            body: dadosForm, // Enviar os dados do JavaScript para o PHP
        });

        // Ler o retorno do PHP com JavaScript
        const resposta = await dados.json();

        // Verificar com JavaScript se cadastrou no banco de dados
        if (resposta['status']) {
            // Usar o SweetAlert para apresentar a mensagem após cadastrar no banco de dados com PHP
            Swal.fire({
                text: resposta['msg'],
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Fechar'
            });
            

        } else {
            // Usar o SweetAlert para apresentar a mensagem de erro após não cadastrar no banco de dados com PHP
            Swal.fire({
                text: resposta['msg'],
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Fechar'
            });
        }
    });


}

// Exemplo basico de SweetAlert2
// Criar função com JavaScript
/*function alert(){
    // Apresentar a mensagem com SweetAlert
    Swal.fire('Sucesso', 'Usuário cadastrado com sucesso!', 'success');
}

// Chamar a função com JavaScript
alert();*/