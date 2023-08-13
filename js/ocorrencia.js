let selectLojaOcorrencia = document.getElementById('ocorrencia_loja');

selectLojaOcorrencia.onchange = () => {
    let selectFuncionarioOcorrencia = document.getElementById('ocorrencia_funcionarios');
    let valorOcorrencia = selectLojaOcorrencia.value;

    fetch("../complements/selects/select_funcionario.php?id_loja=" + valorOcorrencia)
    .then(response => {
        return response.text();
    })
    .then(texto => {
        selectFuncionarioOcorrencia.innerHTML = texto;
    });

}