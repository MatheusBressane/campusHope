function openModalEdit(cd_usuario, tp_classe) {
    document.getElementById('idParaEdit').value = cd_usuario;
    document.getElementById('tpClasseEdit').value = tp_classe;
    document.getElementById('modalEdit').style.display = 'flex';
}

function openModalDel(cd_usuario) {
    document.getElementById('idParaDel').value = cd_usuario;
    document.getElementById('modalDel').style.display = 'flex';
}

function closeModal(id) {
    document.getElementById(id).style.display = 'none';
}

document.getElementById('formFiltros').addEventListener('submit', function (e) {
    e.preventDefault(); // Impede o formulário de recarregar a página

    let formData = new FormData(this);

    fetch('../../database/search/filtroUser.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById('listaUsuarios').innerHTML = data;
        })
        .catch(error => {
            console.error('Erro:', error);
        });
});

// Para já carregar tudo quando abrir a página
window.onload = function () {
    document.getElementById('formFiltros').dispatchEvent(new Event('submit'));

};

$("#cidade").change(function () {
    var cidadeID = $(this).val();
    $.ajax({
        url: "../../database/search/buscaDados.php",
        method: "POST",
        data: {
            tipo: "rotas",
            cd_cidade: cidadeID
        },
        success: function (data) {
            $("#rota").html(data);
        }
    });
});

$("#instituicao").change(function () {
    var instID = $(this).val();
    $.ajax({
        url: "../../database/search/buscaDados.php",
        method: "POST",
        data: {
            tipo: "cursos",
            cd_instituicao: instID
        },
        success: function (data) {
            $("#curso").html(data);
        }
    });
});

$("#curso").change(function () {
    var cursoID = $(this).val();
    if (cursoID === "curso") {
        cursoID = ''; // Define um valor vazio caso o curso selecionado seja "curso"
    }
    $.ajax({
        url: "../../database/search/filtroUser.php", // ou o caminho correto do seu arquivo
        method: "POST",
        data: {
            curso: cursoID,
            // Adicione outros filtros conforme necessário
        },
        success: function (data) {
            // Processa os dados retornados
        }
    });
});

$("#cidade").change(function () {
    var cidadeID = $(this).val();
    if (cidadeID === "cidade") {
        cidadeID = ''; // Define um valor vazio caso a cidade selecionada seja "cidade"
    }
    $.ajax({
        url: "../../database/search/filtroUser.php", // ou o caminho correto do seu arquivo
        method: "POST",
        data: {
            cidade: cidadeID,
            // Adicione outros filtros conforme necessário
        },
        success: function (data) {
            // Processa os dados retornados
        }
    });
});