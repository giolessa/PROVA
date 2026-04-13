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
    $linha = $pergunta . ";" . $resposta . ";" . $a . ";" . $b . ";" . $c . ";" . $d . "\n";
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
    <title>Adicionar perguntas </title>
</head>
<body>
    <h1>Adicione sua pergunta!</h1>
    <form action="perguntasMult.php" method="POST">
        Insira o ID da pergunta: <input type="text" name="id" required>
        <br><br>
        Insira a pergunta: <input type="text" name="pergunta" required>
        <br><br>
        Insira a alternativa correta: <input type="text" name="resposta" required>
        <br><br>
        Insira a alternativa A: <input type="text" name="a" required>
        <br><br>
        Insira a alternativa B: <input type="text" name="b" required>
        <br><br>
        Insira a alternativa C: <input type="text" name="c" required>
        <br><br>
        Insira a alternativa D: <input type="text" name="d" required>
        <br><br>
        <input type="submit" value="Adicionar Pergunta">

    </form>

    <p><?php echo $msg; ?></p>
</body>
</html>