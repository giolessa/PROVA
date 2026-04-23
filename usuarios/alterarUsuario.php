<?php
$msg = "";
$usuario = ["", "", "", ""];

if(isset($_POST['botaoBuscar'])) {
    $id = $_POST["id"];
    $arq = fopen("usuarios.txt", "r") or die("erro ao abrir");
    while (($dados = fgetcsv($arq, 0, ";")) !== FALSE) {
        if ($dados[0] == $id) {
            $usuario = $dados;
            $msg = "usuario encontrado!";
            break;
        }
    }
    fclose($arq);
    if ($usuario[0] == "") $msg = "usuario não encontrado!";
}

if(isset($_POST['botaoAlterar'])) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $temp = [];
    
    $arq = fopen("usuarios.txt", "r") or die("erro na leitura");
    while (($dados = fgetcsv($arq, 0, ";")) !== FALSE) {
        if ($dados[0] == $id) {
            $temp[] = $id . ";" . $nome . ";" . $email . ";" . $senha . "\n";
        } else {
            $temp[] = $dados[0] . ";" . $dados[1] . ";" . $dados[2] . ";" . $dados[3] . "\n";
        }
    }
    fclose($arq);

    $arq = fopen("usuarios.txt", "w") or die("erro na escrita");
    foreach ($temp as $linha) {
        fwrite($arq, $linha);
    }
    fclose($arq);
    $msg = "Alterado com sucesso!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
    <link rel="stylesheet" href="style_alterarUsu.css">
</head>
<body>
    <div class="container-alterar">
        <h1>Alterar Usuário</h1>
        
        <form method="POST">
            <label>ID do Usuário:</label>
            <div class="busca-id">
                <input type="text" name="id" value="<?php echo $usuario[0]; ?>" required>
                <input type="submit" name="botaoBuscar" value="Buscar">
            </div>
        </form>

        <hr>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario[0]; ?>">
            
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $usuario[1]; ?>">

            <label>E-mail:</label>
            <input type="email" name="email" value="<?php echo $usuario[2]; ?>">

            <label>Senha:</label>
            <input type="text" name="senha" value="<?php echo $usuario[3]; ?>">

            <br><br>
            <input type="submit" name="botaoAlterar" value="Confirmar Alteração" 
                   style="width: 100%;" <?php if($usuario[0]=="") echo "disabled"; ?>>
        </form>

        <p class="msg-status"><?php echo $msg; ?></p>
        <a href="index.php" class="link-voltar"><= Voltar</a>
    </div>
</body>
</html>