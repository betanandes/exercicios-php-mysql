<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar e Localizar Pessoa</title>
</head>
<body>
    <h1>Salvar Nome e Idade</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salvar'])) {
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

    // Localizar pessoa pelo nome
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) {
        $nomeBusca = $_POST['nomeBusca'];

        // Prepara a SQL de busca
        $sqlBusca = "SELECT * FROM pessoas WHERE nome = '$nomeBusca'";
        $resultado = $conn->query($sqlBusca);

        if ($resultado->num_rows > 0) {
            // Exibe os resultados
            echo "<h2>Resultado da busca:</h2>";
            while($row = $resultado->fetch_assoc()) {
                echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - Idade: " . $row["idade"] . "<br>";
            }
        } else {
            echo "Nenhuma pessoa encontrada com o nome $nomeBusca.";
        }
    }
    ?>

    <!-- Formulário para salvar pessoa -->
    <form action="index1.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br><br>
        
        <input type="submit" name="salvar" value="Salvar">
    </form>

    <h1>Localizar Pessoa</h1>

    <!-- Formulário para buscar pessoa pelo nome -->
    <form action="index1.php" method="post">
        <label for="nomeBusca">Nome para buscar:</label>
        <input type="text" id="nomeBusca" name="nomeBusca" required><br><br>
        
        <input type="submit" name="buscar" value="Buscar">
    </form>

</body>
</html>
