<?php
$usuarios = [];
$caminho_arquivo = "../data/usuarios.txt";

if(file_exists($caminho_arquivo)) {
    $arq = fopen($caminho_arquivo, "r") or die("Erro ao abrir o arquivo");
    $primeiraLinha = true;
    while(!feof($arq)) {
        $linha = fgets($arq);
        if($primeiraLinha) { $primeiraLinha = false; continue; }
        if(trim($linha) == "") continue;
        $usuarios[] = explode(";", trim($linha));
    }
    fclose($arq);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="../css/style_listaUsuarios.css">
</head>
<body>
    <h1>Usuários Cadastrados</h1>
    <a href="criarUsuario.php"><button>Adicionar Usuário</button></a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $i => $u): ?>
                <tr>
                    <td><?php echo htmlspecialchars($u[0]); ?></td>
                    <td><?php echo htmlspecialchars($u[1]); ?></td>
                    <td><?php echo htmlspecialchars($u[2]); ?></td>
                    <td>
                        <a href="alterarUsuario.php?id=<?php echo $u[0] ?>">Editar</a>
                        <a href="excluirUsuario.php?id=<?php echo $u[0] ?>"
                           onclick="return confirm('Tem certeza que deseja apagar esse usuário?')">Apagar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <a href="../index.php" style="text-decoration: none; color: #888;">Voltar ao Início</a>
</body>
</html>