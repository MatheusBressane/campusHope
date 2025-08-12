$(document).ready(function() {
    $("#formCadastro").submit(function(e) {
        e.preventDefault(); // Evita o envio normal do formulário

        // Pegando os dados do formulário
        var nameUser = $("#nameUser").val();
        var emailUser = $("#emailUser").val();
        var senhaUser = $("#senhaUser").val();
        var confirmSenhaUser = $("#confirmSenhaUser").val();

        // Limpa a área de resultados
        $("#result").html('');

        // Validações no Frontend
        if (nameUser == '' || emailUser == '' || senhaUser == '' || confirmSenhaUser == '') {
            $("#result").html("<p style='color:red;'>Por favor, preencha todos os campos.</p>");
            return;
        }

        if (senhaUser !== confirmarSenha) {
            $("#result").html("<p style='color:red;'>As senhas não coincidem.</p>");
            return;
        }

        if (!validateEmail(emailUser)) {
            $("#result").html("<p style='color:red;'>E-mail inválido.</p>");
            return;
        }

        // Envia os dados via Ajax para o servidor
        $.ajax({
            url: 'register.php', // O arquivo PHP que vai processar o cadastro
            method: 'POST',
            data: {
                nameUser: nameUser,
                emailUser: emailUser,
                senhaUser: senhaUser
            },
            success: function(response) {
                // Exibe a resposta do servidor (se deu certo ou erro)
                $("#result").html(response);
            }
        });
    });

    // Função para validar o formato do e-mail
    function validateEmail(emailUser) {
        var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return regex.test(emailUser);
    }
});