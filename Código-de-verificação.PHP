<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $usuarioDigitado = $_POST['usuario'];
    $senhaDigitada = $_POST['senha'];

    $usuariosCadastrados = ['admin', 'jogador1', 'professor'];
    $senhaCorreta = '1234'; // Senha padrão para o teste

    if (!in_array($usuarioDigitado, $usuariosCadastrados)) {
        
        echo "<div style='color: red; font-family: Arial; text-align: center; margin-top: 50px;'>";
        echo "<h2>❌ Erro: Este login não existe no jogo!</h2>";
        echo "<p>Verifique o nome de usuário ou crie uma conta.</p>";
        echo "<a href='index.php'>Voltar para o Login</a>";
        echo "</div>";

    } else {

        if ($senhaDigitada === $senhaCorreta) {
            echo "<div style='color: green; font-family: Arial; text-align: center; margin-top: 50px;'>";
            echo "<h2>🎉 Bem-vindo ao painel do Jogo, " . $usuarioDigitado . "!</h2>";
            echo "</div>";
        } else {
            echo "<div style='color: orange; font-family: Arial; text-align: center; margin-top: 50px;'>";
            echo "<h2>🔑 Senha incorreta!</h2>";
            echo "<a href='index.php'>Tentar novamente</a>";
            echo "</div>";
        }
    }

} else {
    // Proteção: se tentarem acessar admin.php direto pela URL sem passar pelo formulário
    header("Location: index.php");
    exit();
}
?>
