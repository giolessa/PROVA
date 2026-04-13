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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
</head>
<body>
    <h1>Alterar Usuário</h1>
    <form method="POST">
        id: <input type="text" name="id" value="<?php echo $usuario[0]; ?>">
        <input type="submit" name="botaoBuscar" value="Buscar">
    </form>
    <hr>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario[0]; ?>">
        Usuário: <input type="text" name="usuario" value="<?php echo $usuario[1]; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $usuario[2]; ?>"><br><br>
        E-mail: <input type="text" name="email" value="<?php echo $usuario[3]; ?>"><br><br>
        <input type="submit" name="botaoAlterar" value="Confirmar Alteração" <?php if($usuario[0]=="") echo "disabled"; ?>>
    </form>
    <p><strong><?php echo $msg; ?></strong></p>

    <?php echo $msg; ?>
</body>
</html>