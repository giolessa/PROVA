<?php
$msg = "";
$pergunta = ["", "", "", "", "", "", ""];
$arquivo_nome = "../data/multipla.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buscar"])) {
    $id = $_POST["id"];
    if (file_exists($arquivo_nome)) {
        $arquivo = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arquivo, 0, ";")) !== FALSE) {
            if ($dados[0] == $id) {
                $pergunta = $dados;
                $msg = "Questão encontrada!";
                break;
            }
        }
        fclose($arquivo);
    }
    if ($pergunta[0] == "") $msg = "Questão não encontrada!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["excluir"])) {
    $id = $_POST["id"];
    $temp = [];
    if (file_exists($arquivo_nome)) {
        $arquivo = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arquivo, 0, ";")) !== FALSE) {
            if ($dados[0] != $id) $temp[] = $dados; 
        }
        fclose($arquivo);
        $arquivo = fopen($arquivo_nome, "w");
        foreach ($temp as $linha) fputcsv($arquivo, $linha, ";"); 
        fclose($arquivo);
        $msg = "Excluída com sucesso!";
        $pergunta = ["", "", "", "", "", "", ""]; 
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Múltipla Escolha</title>
    <link rel="stylesheet" href="../css/style_excluir.css">
</head>
<body>
    <div class="container">
        <h2>Excluir Questão Objetiva</h2>
        <form action="excluirMult.php" method="POST">
            <label>ID:</label>
            <input type="text" name="id" value="<?= $pergunta[0] ?>" required>
            <button type="submit" name="buscar">Buscar</button>
            <hr>
            <p>Enunciado: <b><?= $pergunta[1] ?></b></p>
            <p>Correta: <b><?= $pergunta[2] ?></b></p>
            <p>A: <?= $pergunta[3] ?> | B: <?= $pergunta[4] ?> | C: <?= $pergunta[5] ?> | D: <?= $pergunta[6] ?></p>
            <button type="submit" name="excluir" class="btn-del" <?= $pergunta[0] == "" ? "disabled" : "" ?>>Confirmar Exclusão</button>
        </form>
        <p><?= $msg ?></p>
        <a href="../index.php">Voltar</a>
    </div>
</body>
</html>