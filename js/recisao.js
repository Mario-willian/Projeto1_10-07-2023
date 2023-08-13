let selectLojaRecisao = document.getElementById('recisao_loja');

selectLojaRecisao.onchange = () => {
    let selectFuncionarioRecisao = document.getElementById('recisao_funcionario');
    let valorRecisao = selectLojaRecisao.value;

    fetch("../complements/selects/select_funcionario.php?id_loja=" + valorRecisao)
    .then(response => {
        return response.text();
    })
    .then(texto => {
        selectFuncionarioRecisao.innerHTML = texto;
    });

}