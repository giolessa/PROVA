<?php
$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];

    if(!file_exists("perguntas.txt")) {
        $arq = fopen("perguntas.txt", "w");
        fwrite($arq, "id;pergunta;resposta\n");
        fclose($arq);
    }

    $arq = fopen("perguntas.txt", "a");
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
    <title>Adicionar Pergunta</title>
</head>
<body>
    <h1>Adicione sua pergunta!</h1>
    <form action="perguntas.php" method="POST">
        Insira o ID da pergunta: <input type="text" name="id" required>
        <br><br>
        Insira a pergunta: <input type="text" name="pergunta" required>
        <br><br>
        Insira a resposta modelo: <input type="text" name="resposta" required>
        <br><br>    
        <input type="submit" value="Adicionar Pergunta">
    </form>

    <p><?php echo $msg; ?></p>
</body>
</html>