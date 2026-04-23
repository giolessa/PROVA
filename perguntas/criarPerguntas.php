<?php
$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];

    $caminho_arquivo = "../data/perguntas.txt";
    
    if(!file_exists($caminho_arquivo)) {
        $arq = fopen($caminho_arquivo, "w");
        fwrite($arq, "id;pergunta;resposta\n");
        fclose($arq);
    } 

    $arq = fopen($caminho_arquivo, "a");
    $linha = $id . ";" . $pergunta . ";" . $resposta . "\n";
    fwrite($arq, $linha);
    fclose($arq);

    $msg = "Pergunta adicionada com sucesso!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pergunta Discursiva</title>
    <link rel="stylesheet" href="../css/style_perguntas.css">
</head>
<body>
    <div class="card">
    <h1>Adicione sua pergunta!</h1>
    <form action="criarPerguntas.php" method="POST">
        <label>Insira o ID da pergunta:</label>
        <input type="text" name="id" required>
        
        <label>Insira a pergunta:</label>
        <input type="text" name="pergunta" required>
        
        <label>Resposta Modelo:</label>
        <input type="text" name="resposta" required>

        <input type="submit" value="Adicionar Pergunta">
    </form>
    <?php if ($msg): ?>
        <p class="msg sucesso"><?php echo $msg; ?></p>
    <?php endif; ?>
    <a href="../index.php" class="voltar"><= Voltar ao inicio</a>
    </div>
</body>
</html>