let selectLojaFerias = document.getElementById('ferias_loja');

selectLojaFerias.onchange = () => {
    let selectFuncionarioFerias = document.getElementById('ferias_funcionario');
    let valorFerias = selectLojaFerias.value;

    fetch("../complements/selects/select_funcionario_editar2.php?id_loja=" + valorFerias)
    .then(response => {
        return response.text();
    })
    .then(texto => {
        selectFuncionarioFerias.innerHTML = texto;
    });

}