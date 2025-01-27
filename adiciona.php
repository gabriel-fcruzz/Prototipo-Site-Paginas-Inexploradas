<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter os dados do formulário
    $verbete = $_POST['Verbete'];
    $descricao = $_POST['descricao'];
    $contribuicao = $_POST['contribuicao'];
    $email = $_POST['email'];
    $imagelink = $_POST['imagelink']; // novo campo para o link da imagem

    // Conectar ao banco de dados usando mysqli
    $conexao = mysqli_connect('localhost', 'id22330423_gabrielcruzf21', 'Gabriel@2106');
    mysqli_select_db($conexao, 'id22330423_bancoteste');

    // Verificar conexão
    if ($conexao->connect_error) {
        die('Erro de conexão: ' . $conexao->connect_error);
    }

    // Preparar a consulta
    $consulta = $conexao->prepare('INSERT INTO registros (livro_nome, livro_resenha, usuario_nome, usuario_email, livro_imagem) VALUES (?, ?, ?, ?, ?)');
    $consulta->bind_param('sssss', $livro_nome, $resenha, $usuario_nome, $email, $imagem);

    // Executar a consulta
    if ($consulta->execute()) {
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
    } else {
        echo 'Erro na verficação.' . $consulta->error;
    }

    // Fechar a conexão
    $conexao->close();
}
?>