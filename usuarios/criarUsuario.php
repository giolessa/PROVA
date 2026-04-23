<?php
$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    $caminho_arquivo = "../data/usuarios.txt";
    
    if(!file_exists($caminho_arquivo)) {
        $arq = fopen($caminho_arquivo, "w");
        fwrite($arq, "id;usuario;email;senha\n");
        fclose($arq);
    }

    $arq = fopen($caminho_arquivo, "a");
    $linha = $id . ";" . $usuario . ";" . $email . ";" . $senha . "\n";
    fwrite($arq, $linha);
    fclose($arq);

    $msg = "Usuário cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pergunta</title>
    <link rel="stylesheet" href="../css/style_criarUsu.css">
</head>
<body>

    <div class="card-user">
        <h1>Criar Novo Perfil</h1>
        <form action="criarUsuario.php" method="POST">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" required>
            
            <label for="usuario">Nome de Usuário:</label>
            <input type="text" id="usuario" name="usuario" required>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            
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
            <a href="../index.php" style="color: #aaa; text-decoration: none; font-size: 13px;"><= Voltar ao Início</a>
        </div>
    </div>

</body>
</html>