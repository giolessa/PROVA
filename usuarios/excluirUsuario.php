<?php
$msg = "";
$usuario = ["", "", "", ""];
$arquivo_nome = "usuarios.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buscar"])) {
    $id = $_POST["id"];
    
    if (file_exists($arquivo_nome)) {
        $arquivo = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arquivo, 0, ";")) !== FALSE) {
            if ($dados[0] == $id) {
                $usuario = $dados;
                $msg = "Usuário encontrado!";
                break;
            }
        }
        fclose($arquivo);
    }
    
    if ($usuario[0] == "") {
        $msg = "Usuário não encontrado!";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["excluir"])) {
    $id = $_POST["id"];
    $temp = [];
    $encontrado = false;

    if (file_exists($arquivo_nome)) {
        $arquivo = fopen($arquivo_nome, "r");
        while (($dados = fgetcsv($arquivo, 0, ";")) !== FALSE) {
            if ($dados[0] != $id) {
                $temp[] = $dados; 
            } else {
                $encontrado = true;
            }
        }
        fclose($arquivo);

        if ($encontrado) {
            $arquivo = fopen($arquivo_nome, "w");
            foreach ($temp as $linha) {
                fputcsv($arquivo, $linha, ";"); 
            }
            fclose($arquivo);
            $msg = "Usuário excluído com sucesso!";
        } else {
            $msg = "ID não encontrado para exclusão.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Usuário</title>
    <link rel="stylesheet" href="style_excluirUsu.css">
</head>
<body>
    <div class="container">
        <h2>Excluir Usuário</h2>

        <form action="excluirUsuario.php" method="POST">
            <label>ID:</label>
            <div class="busca-row">
                <input type="text" name="id" value="<?= $usuario[0] ?>" required>
                <button type="submit" name="buscar">Buscar</button>
            </div>
            
            <hr>
            
            <div class="info-box">
                <p>Nome: <b><?= $usuario[1] ?></b></p>
                <p>E-mail: <b><?= $usuario[2] ?></b></p>
            </div>

            <button type="submit" name="excluir" class="btn-confirmar" <?= $usuario[0] == "" ? "disabled" : "" ?>>
                Confirmar Exclusão
            </button>
        </form>

        <p class="msg-status"><?= $msg ?></p>
        
        <br>
        <a href="index.php" class="link-voltar">Voltar ao Início</a>
    </div>
</body>
</html>