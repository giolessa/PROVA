<?php
$perguntas = [];
$arquivo = "multipla.txt";

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
    <title>Lista de Perguntas Múltipla Escolha</title>
    <link rel="stylesheet" href="style_listas.css">
</head>
<body>
    <h1>Perguntas de Múltipla Escolha</h1>
    <a href="criarPerguntasMult.php"><button>+ Adicionar Questão</button></a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Enunciado</th>
                <th>Correta</th>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>D</th>
                <th>Ações</th>
            </tr>
        </thead>
       <tbody>
    <?php foreach($perguntas as $i => $p): ?>
        <tr>
            <td><?php echo htmlspecialchars($p[0]); ?></td>
            
            <td><?php echo htmlspecialchars($p[1]); ?></td>
            
            <td style="font-weight: bold; color: #a8b5a2;">
                <?php echo htmlspecialchars($p[2]); ?>
            </td>
            
            <td><?php echo htmlspecialchars($p[3]); ?></td> <td><?php echo htmlspecialchars($p[4]); ?></td> <td><?php echo htmlspecialchars($p[5]); ?></td> <td><?php echo htmlspecialchars($p[6]); ?></td> <td>
                <a href="alterarMult.php?linha=<?php echo $i ?>">Editar</a>
                <a href="excluirMult.php?linha=<?php echo $i ?>"
                   onclick="return confirm('Tem certeza que deseja apagar essa pergunta?')">Apagar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
    </table>

    <br>
    <a href="index.php">Voltar ao Início</a>
</body>
</html>