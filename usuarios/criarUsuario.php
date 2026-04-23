<?php
$msg = "";
$arquivo = "multipla.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $d = $_POST["d"];

    $id_existe = false;
    if (file_exists($arquivo)) {
        $arq_leitura = fopen($arquivo, "r");
        while (($dados = fgetcsv($arq_leitura, 0, ";")) !== FALSE) {
            if ($dados[0] == $id) {
                $id_existe = true;
                break;
            }
        }
        fclose($arq_leitura);
    }

    if ($id_existe) {
        $msg = "ERRO: Já existe uma pergunta com o ID $id!";
    } else {
        $arq = fopen($arquivo, "a");
        fputcsv($arq, [$id, $pergunta, $resposta, $a, $b, $c, $d], ";");
        fclose($arq);
        
        header("Location: " . $_SERVER['PHP_SELF'] . "?sucesso=1");
        exit;
    }
}

if (isset($_GET['sucesso'])) {
    $msg = "Pergunta adicionada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pergunta</title>
    <link rel="stylesheet" href="style_criarUsu.css">
</head>
<body>

    <div class="card-user">
        <h1>Criar Novo Perfil</h1>
        <form action="criarUsuario.php" method="POST">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" required>
            
            <label for="usuario">Nome de Usuário:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Como quer ser chamado?" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="email@exemplo.com" required>
            
            <label for="senha">Senha de Acesso:</label>
            <input type="password" id="senha" name="senha" placeholder="Crie uma senha forte" required>

            <input type="submit" value="Finalizar Cadastro"> 
        </form>
        
        <?php if ($msg): ?>
            <p class="msg <?php echo (strpos($msg, 'ERRO') !== false) ? 'erro' : 'sucesso'; ?>">
                <?php echo $msg; ?>
            </p>
        <?php endif; ?>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="index.php" style="color: #aaa; text-decoration: none; font-size: 13px;"><= Voltar ao Início</a>
        </div>
    </div>

</body>
</html>