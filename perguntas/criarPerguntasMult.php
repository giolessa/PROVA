<?php
$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $d = $_POST["d"];

   if(!file_exists("multipla.txt")) {
        $arq = fopen("multipla.txt", "w");
        fwrite($arq, "pergunta;resposta;a;b;c;d\n");
        fclose($arq);
    }

    $arq = fopen("multipla.txt", "a");
    $linha = $id . ";" . $pergunta . ";" . $resposta . ";" . $a . ";" . $b . ";" . $c . ";" . $d . "\n";
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
    <title>Adicionar Múltipla Escolha</title>
    <link rel="stylesheet" href="style_perguntas.css">
</head>
<body>
    <div class="card">
        <h1>Adicione sua Pergunta Múltipla Escolha</h1>
        <form action="criarPerguntasMult.php" method="POST">
            <label>ID:</label>
            <input type="text" name="id" required>

            <label>Pergunta:</label>
            <input type="text" name="pergunta" required>

            <label>Alternativa Correta (Letra):</label>
            <input type="text" name="resposta" maxlength="1" required>

            <label>Opção A:</label>
            <input type="text" name="a" required>

            <label>Opção B:</label>
            <input type="text" name="b" required>

            <label>Opção C:</label>
            <input type="text" name="c" required>

            <label>Opção D:</label>
            <input type="text" name="d" required>

            <input type="submit" value="Salvar Pergunta">
        </form>
        <?php if ($msg): ?>
            <p class="msg sucesso"><?php echo $msg; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>