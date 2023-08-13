let selectLojaRecisao = document.getElementById('recisao_loja');

selectLojaRecisao.onchange = () => {
    let selectFuncionarioRecisao = document.getElementById('recisao_funcionario');
    let valorOcorrencia = selectLojaRecisao.value;

    fetch("../complements/selects/select_funcionario_editar2.php?id_loja=" + valorOcorrencia)
    .then(response => {
        return response.text();
    })
    .then(texto => {
        selectFuncionarioRecisao.innerHTML = texto;
    });

}