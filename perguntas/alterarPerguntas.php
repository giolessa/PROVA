<?php
$msg = "";
$pergunta = ["", "", ""]; 

$arquivo_nome = "../data/perguntas.txt";
 

if (isset($_POST['botaoBuscar'])) {
    $id = $_POST["id"];
    if (file_exists($arquivo_nome)) {
        $arq = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arq, 0, ";")) !== FALSE) {
            if ($dados[0] == $id) {
                $pergunta = $dados;
                $msg = "Pergunta encontrada!";
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
    <link rel="stylesheet" href="../css/style_alterar.css">
    <title>Alterar Pergunta</title>
</head>
<body>
    <div class="container-alterar">
        <h1>Alterar Perguntas</h1>
        
        <form action="alterarPerguntas.php" method="POST">
            <label>ID da pergunta para buscar:</label>
            <div class="busca-id">
                <input type="text" name="id" value="<?php echo $pergunta[0]; ?>" required>
                <input type="submit" name="botaoBuscar" value="Buscar">
            </div>
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
            <a href="../index.php" class="link-voltar"><= Voltar ao inicio</a>
        </p>
        </div>
    </body>
    </html>