<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="css/style_index.css">
</head>
<body>

    <div class="dashboard-container">
        <header>
            <h1>Painel de Gerenciamento</h1>
        </header>

        <div class="grid-opcoes">
            <div class="card-menu">
                <h2>Perguntas</h2>
                <a href="perguntas/listPerguntas.php" class="btn">Perguntas Discursivas</a>
                <a href="perguntas/listPerguntasMult.php" class="btn">Perguntas Múltipla Escolha</a>
                <a href="perguntas/telaPerguntas.php" class="btn btn-destaque">Criar Nova Pergunta</a>
                <a href="perguntas/alterarPergunta.php" class="btn btn-destaque">Alterar Pergunta</a>
                
                <div class="divisor"></div>
                <a href="perguntas/excluirPergunta.php" class="btn-perigo">Excluir Discursiva</a>
                <a href="perguntas/excluirMult.php" class="btn-perigo">Excluir Múltipla Escolha</a>
            </div>

            <div class="card-menu">
                <h2>Usuários</h2>
                <a href="usuarios/listUsuario.php" class="btn">Usuários</a>
                <a href="usuarios/criarUsuario.php" class="btn btn-destaque-rosa">Cadastrar Novo Usuário</a>
                <a href="usuarios/alterarUsuario.php" class="btn">Alterar Usuário</a>
                <div class="divisor"></div>
                <a href="usuarios/excluirUsuario.php" class="btn-perigo">Excluir Usuário</a>
            </div>
        </div>
    </div>

</body>
</html>