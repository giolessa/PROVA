<?php
$msg = "";
$pergunta = ["", "", ""]; 

$arquivo_nome = "perguntas.txt";


if (isset($_POST['botaoBuscar'])) {
    $id = $_POST["id"];
    if (file_exists($arquivo_nome)) {
        $arq = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arq, 0, ";")) !== FALSE) {
            if ($dados[0] == $id) {
                $pergunta = $dados;
                $msg = "Pergunta encontrada!";
                echo $dados[1];
                break;
            }
        }
        fclose($arq);
    }
    if ($pergunta[0] == "") $msg = "Pergunta não encontrada!";
}


if (isset($_POST['botaoAlterar'])) {
    $id = $_POST["id"];
    $nova_pergunta = $_POST["pergunta_texto"]; 
    $nova_resposta = $_POST["resposta"];
    $temp = [];
    $encontrou = false;
    
    if (file_exists($arquivo_nome)) {
        $arq = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arq, 0, ";")) !== FALSE) {
            if ($dados[0] == $id) {
                $temp[] = [$id, $nova_pergunta, $nova_resposta];
                $encontrou = true;
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
        
        $msg = "Pergunta alterada com sucesso!";
        $pergunta = ["", "", ""];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Pergunta</title>
</head>
<body>
    <h1>Alterar Perguntas</h1>
    
    <form method="POST">
        <label>ID da pergunta para buscar:</label><br>
        <input type="text" name="id" value="<?php echo $pergunta[0]; ?>" required>
        <input type="submit" name="botaoBuscar" value="Buscar">
    </form>
    
    <hr>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $pergunta[0]; ?>">
        
        <label>Pergunta:</label><br>
        <input type="text" name="pergunta_texto" size="50" value="<?php echo $pergunta[1]; ?>"><br>
        
        <label>Resposta:</label><br>
        <input type="text" name="resposta" size="50" value="<?php echo $pergunta[2]; ?>"><br><br>
        
        <input type="submit" name="botaoAlterar" value="Confirmar Alteração" 
            <?php if(empty($pergunta[0])) echo "disabled"; ?>>
    </form>

    <p class="<?php echo (strpos($msg, 'sucesso') !== false || strpos($msg, 'encontrada!') !== false) ? 'sucesso' : 'erro'; ?>">
        <?php echo $msg; ?>
    </p>

</body>
</html>