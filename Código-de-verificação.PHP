<?php
// 1. Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 2. Captura o que o usuário digitou
    $usuarioDigitado = $_POST['usuario'];
    $senhaDigitada = $_POST['senha'];

    // 3. Simulação de contas existentes no jogo (Simulando um Banco de Dados)
    // Aqui criamos uma lista de usuários válidos
    $usuariosCadastrados = ['admin', 'jogador1', 'professor'];
    $senhaCorreta = '1234'; // Senha padrão para o teste

    // 4. VERIFICAÇÃO 1: O usuário existe na nossa lista?
    if (!in_array($usuarioDigitado, $usuariosCadastrados)) {
        
        // Se NÃO estiver na lista, exibe o erro que você pediu
        echo "<div style='color: red; font-family: Arial; text-align: center; margin-top: 50px;'>";
        echo "<h2>❌ Erro: Este login não existe no jogo!</h2>";
        echo "<p>Verifique o nome de usuário ou crie uma conta.</p>";
        echo "<a href='index.php'>Voltar para o Login</a>";
        echo "</div>";

    } else {
        
        // 5. VERIFICAÇÃO 2: Se o usuário existe, a senha está certa?
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
