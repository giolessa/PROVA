<?php
$msg = "";
$arquivo_nome = "../data/multipla.txt";
$dados_pergunta = ["", "", "", "", "", "", ""];

if (isset($_POST['botaoBuscar'])) {
    $id_busca = $_POST["id_busca"]; 
    
    if (file_exists($arquivo_nome)) {
        $arq = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arq, 0, ";")) !== FALSE) {
            if ($dados[0] == $id_busca) {
                $dados_pergunta = $dados;
                $msg = "Pergunta encontrada!";
                break;
            }
        }
        fclose($arq);
    }
    if (empty($dados_pergunta[0])) {
        $msg = "Erro: ID não encontrado!";
    }
}

if (isset($_POST['botaoAlterar'])) {
    $id = $_POST["id"];
    $nova_pergunta = [
        $id,
        $_POST["pergunta"],
        $_POST["resposta"],
        $_POST["a"],
        $_POST["b"],
        $_POST["c"],
        $_POST["d"]
    ];

    $temp = [];
    if (file_exists($arquivo_nome)) {
        $arq = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arq, 0, ";")) !== FALSE) {
            if ($dados[0] == $id) {
                $temp[] = $nova_pergunta;
            } else {
                $temp[] = $dados;
            }
        }
        fclose($arq);

        $arq = fopen($arquivo_nome, "w");
        foreach ($temp as $linha) {
            fputcsv($arq, $linha, ";");
        }
        fclose($arq);

        $msg = "Pergunta $id alterada com sucesso!";
        $dados_pergunta = array_fill(0, 7, "");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Múltipla Escolha</title>
    <link rel="stylesheet" href="../css/style_alterar.css">
</head>
<body>

    <div class="container-alterar">
        <h1>Gerenciar Múltipla Escolha</h1>

        <form method="POST" action="">
            <label>Digite o ID para editar:</label>
            <div class="busca-id">
                <input type="text" name="id_busca" required>
                <input type="submit" name="botaoBuscar" value="Buscar">
            </div>
        </form>

        <hr>

        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $dados_pergunta[0]; ?>">

            <label>Pergunta:</label>
            <input type="text" name="pergunta" value="<?php echo $dados_pergunta[1]; ?>" required>

            <label>Resposta Correta (Letra):</label>
            <input type="text" name="resposta" value="<?php echo $dados_pergunta[2]; ?>" maxlength="1" required>

            <label>Opção A:</label>
            <input type="text" name="a" value="<?php echo $dados_pergunta[3]; ?>" required>

            <label>Opção B:</label>
            <input type="text" name="b" value="<?php echo $dados_pergunta[4]; ?>" required>

            <label>Opção C:</label>
            <input type="text" name="c" value="<?php echo $dados_pergunta[5]; ?>" required>

            <label>Opção D:</label>
            <input type="text" name="d" value="<?php echo $dados_pergunta[6]; ?>" required>

            <input type="submit" name="botaoAlterar" value="Confirmar Alteração" 
                   class="btn-confirmar" <?php if(empty($dados_pergunta[0])) echo "disabled"; ?>>
        </form>

        <p class="msg-status <?php echo (strpos($msg, 'sucesso') !== false || strpos($msg, 'encontrada') !== false) ? 'sucesso' : 'erro'; ?>">
            <?php echo $msg; ?>
        </p>

        <a href="../index.php" class="link-voltar"><= Voltar ao Início</a>
    </div>

</body>
</html>