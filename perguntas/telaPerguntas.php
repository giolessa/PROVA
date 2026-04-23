<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolher Tipo de Pergunta</title>
    <link rel="stylesheet" href="style_escolha.css">
</head>
<body>

    <div class="container-escolha">
        <header>
            <h1>O que vamos criar hoje?</h1>
            <p>Selecione o formato da nova pergunta</p>
        </header>

        <div class="opcoes-flex">
            <a href="criarPerguntas.php" class="card-opcao">
                <h2>Discursiva</h2>
                <p>Perguntas em texto</p>
                <span class="btn-ir">Criar -></span>
            </a>

            <a href="criarPerguntasMult.php" class="card-opcao">
                <h2>Múltipla Escolha</h2>
                <p>Perguntas com alternativas com alternativas de A até D</p>
                <span class="btn-ir">Criar -></span>
            </a>
        </div>

        <a href="index.php" class="voltar"><= Voltar ao inicio</a>
    </div>

</body>
</html>