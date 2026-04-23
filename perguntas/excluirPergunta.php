<?php
$msg = "";
$pergunta = ["", "", ""];
$arquivo_nome = "perguntas.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buscar"])) {
    $id = $_POST["id"];
    if (file_exists($arquivo_nome)) {
        $arquivo = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arquivo, 0, ";")) !== FALSE) {
            if ($dados[0] == $id) {
                $pergunta = $dados;
                $msg = "Pergunta encontrada!";
                break;
            }
        }
        fclose($arquivo);
    }
    if ($pergunta[0] == "") $msg = "Pergunta não encontrada!";
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
        $pergunta = ["", "", ""]; 
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Discursiva</title>
    <link rel="stylesheet" href="style_excluir.css">
</head>
<body>
    <div class="container">
        <h2>Excluir Pergunta Discursiva</h2>
        <form action="excluirPergunta.php" method="POST">
            <label>ID:</label>
            <input type="text" name="id" value="<?= $pergunta[0] ?>" required>
            <button type="submit" name="buscar">Buscar</button>
            <hr>
            <p>Pergunta: <b><?= $pergunta[1] ?></b></p>
            <p>Resposta: <b><?= $pergunta[2] ?></b></p>
            <button type="submit" name="excluir" class="btn-del" <?= $pergunta[0] == "" ? "disabled" : "" ?>>Confirmar Exclusão</button>
        </form>
        <p><?= $msg ?></p>
        <a href="lista_discursivas.php">Voltar</a>
    </div>
</body>
</html>