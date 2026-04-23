<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="style_index.css">
</head>
<body>

    <div class="dashboard-container">
        <header>
            <h1>Painel de Gerenciamento</h1>
        </header>

        <div class="grid-opcoes">
            <div class="card-menu">
                <h2>Perguntas</h2>
                <a href="listPerguntas.php" class="btn">Perguntas Discursivas</a>
                <a href="listPerguntasMult.php" class="btn">Perguntas Múltipla Escolha</a>
                <a href="telaPerguntas.php" class="btn btn-destaque">Criar Nova Pergunta</a>
                
                <div class="divisor"></div>
                <a href="excluirPergunta.php" class="btn-perigo">Excluir Discursiva</a>
                <a href="excluirMult.php" class="btn-perigo">Excluir Múltipla Escolha</a>
            </div>

            <div class="card-menu">
                <h2>Usuários</h2>
                <a href="listUsuarios.php" class="btn">Usuários</a>
                <a href="criarUsuario.php" class="btn btn-destaque-rosa">Cadastrar Novo Usuário</a>
                <a href="alterarUsuario.php" class="btn">Alterar Usuário</a>
                <div class="divisor"></div>
                <a href="excluirUsuario.php" class="btn-perigo">Excluir Usuário</a>
            </div>
        </div>
    </div>

</body>
</html>