document.addEventListener("DOMContentLoaded", function () {
    const abrirPerfil = document.querySelector('.abrirPerfil');
    const perfilOpcao = document.querySelector('.perfil-opcao');
    const perfilContainer = document.querySelector('.perfil');
    const fecharPerfil = document.querySelector('.fechar-Perfil');

    // Abrir e fechar o menu de perfil
    if (abrirPerfil && perfilOpcao) {
        abrirPerfil.addEventListener('click', function (event) {
            // Só abre/fecha o menu se largura for <= 850px
            if (window.innerWidth <= 850) {
                event.stopPropagation();
                perfilOpcao.style.display = (perfilOpcao.style.display === 'block') ? 'none' : 'block';
            }
        });
    }

    // Fecha ao clicar fora do menu de perfil
    document.addEventListener('click', function (event) {
        if (window.innerWidth <= 850) {
            if (perfilOpcao && !perfilContainer.contains(event.target)) {
                perfilOpcao.style.display = 'none';
            }
        }
    });

    // Botão "Voltar"
    if (fecharPerfil) {
        fecharPerfil.addEventListener('click', function () {
            perfilOpcao.style.display = 'none';
        });
    }

    // Código do formulário
    const paragrafo = document.getElementById('mostrarForm');
    const formulario = document.getElementById('formFiltros');
    const botaoFechar = document.getElementById('botaoFechar');

    if (paragrafo && formulario) {
        paragrafo.addEventListener('click', () => {
            formulario.style.display = 'block';
        });
    }

    if (botaoFechar && formulario) {
        botaoFechar.addEventListener('click', () => {
            formulario.style.display = 'none';
        });
    }
});
