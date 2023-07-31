// Recuperar do HTML o SELETOR cad-funcionario-form com JavaScript
const cadfuncionarioForm = document.getElementById("cad-funcionario-form");

// Verificar se a constante cadfuncionarioForm é TRUE
if (cadfuncionarioForm) {

    // Aguardar e identificar o clique do usuário no botão cadstrar com JavaScript
    cadfuncionarioForm.addEventListener("submit", async (e) => {

        // Bloquear o recarregamento da página com JavaScript
        e.preventDefault();

        Swal.fire({
            title: "Deseja excluir este funcionário?",
            text: "Excluindo, voce não conseguirá reverter esta exclusão e recupera-lo!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar funcionário!'
          }).then((result) => {
            if (result.isConfirmed) {

                // Receber os dados do formulário com JavaScript
        const dadosForm = new FormData(cadfuncionarioForm);

        // Enviar os dados do JavaScript para o PHP
        const dados = fetch("../classes/deletes/funcionario.php", {
            method: "POST", // Enviar os dados do JavaScript para o PHP através do método POST
            body: dadosForm, // Enviar os dados do JavaScript para o PHP
        });

        // Ler o retorno do PHP com JavaScript
        const resposta = dados.json();

        //FALTA FALAR QUE EXCLUIU

              
            }
          })
          
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