<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Pessoa</title>
</head>
<body>
    <h1>Salvar Nome e Idade</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recebe os dados do formulário
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];

        // Prepara a SQL de inserção
        $sql = "INSERT INTO pessoas (nome, idade) VALUES ('$nome', $idade)";

        // Executa a SQL
        if ($conn->query($sql) === TRUE) {
            echo "Novo registro salvo com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <form action="index.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br><br>
        
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
