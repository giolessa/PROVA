<?php
$perguntas = [];
$arquivo = "../data/perguntas.txt";

if(file_exists($arquivo)) {
    $arq = fopen($arquivo, "r") or die("Erro ao abrir o arquivo");
    $primeiraLinha = true;
    while(!feof($arq)) {
        $linha = fgets($arq);
        if($primeiraLinha) { $primeiraLinha = false; continue; }
        if(trim($linha) == "") continue;
        $perguntas[] = explode(";", trim($linha));
    }
    fclose($arq);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Perguntas Discursivas</title>
    <link rel="stylesheet" href="../css/style_listas.css">
</head>
<body>
    <h1>Perguntas Discursivas Cadastradas</h1>
    <a href="criarPerguntas.php"><button>+ Adicionar Pergunta</button></a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pergunta</th>
                <th>Resposta Modelo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($perguntas as $i => $p): ?>
                <tr>
                    <td><?php echo htmlspecialchars($p[0]); ?></td>
                    <td><?php echo htmlspecialchars($p[1]); ?></td>
                    <td><?php echo htmlspecialchars($p[2]); ?></td>
                    <td>
                        <a href="alterarPerguntas.php?linha=<?php echo $i ?>">Editar</a>
                        <a href="excluirPergunta.php?linha=<?php echo $i ?>"
                           onclick="return confirm('Tem certeza que deseja apagar essa pergunta?')">Apagar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <br>
    <a href="../index.php">Voltar ao Início</a>
</body>
</html>