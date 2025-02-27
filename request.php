<?php
// Função para filtrar dados de entrada
function filtroInput($data) {
    return htmlspecialchars(trim($data));
}


// Função para exibir os dados recebidos
function displayFormData($nome, $email, $telefone, $mensagem) {
    echo "<div class='data-container'>";
    echo "<h2>Dados Recebidos</h2>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Telefone:</strong> $telefone</p>";
    echo "<p><strong>Mensagem:</strong> $mensagem</p>";
    echo "</div>";
}


// Função para exibir o cabeçalho da requisição HTTP
function displayRequestHeaders() {
    echo "<div class='header-container'>";
    echo "<h2>Cabeçalho da Requisição HTTP</h2>";
    echo "<pre>";
    foreach (getallheaders() as $name => $value) {
        echo "$name: $value\n";
    }
    echo "</pre>";
    echo "<p><strong>Método Utilizado:</strong> " . $_SERVER['REQUEST_METHOD'] . "</p>";
    echo "</div>";
}


// Função para exibir uma mensagem de erro
function displayError($message) {
    echo "<div class='error-container'>";
    echo "<h2>Erro</h2>";
    echo "<p>$message</p>";
    echo "</div>";
}


// Verifica o método da requisição
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura e sanitiza os dados do formulário (POST)
    $nome = isset($_POST['nome']) ? filtroInput($_POST['nome']) : '';
    $email = isset($_POST['email']) ? filtroInput($_POST['email']) : '';
    $telefone = isset($_POST['telefone']) ? filtroInput($_POST['telefone']) : '';
    $mensagem = isset($_POST['mensagem']) ? filtroInput($_POST['mensagem']) : '';
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Captura e sanitiza os dados da URL (GET)
    $nome = isset($_GET['nome']) ? filtroInput($_GET['nome']) : '';
    $email = isset($_GET['email']) ? filtroInput($_GET['email']) : '';
    $telefone = isset($_GET['telefone']) ? filtroInput($_GET['telefone']) : '';
    $mensagem = isset($_GET['mensagem']) ? filtroInput($_GET['mensagem']) : '';
} else {
    // Exibe erro se o método não for POST ou GET
    displayError("Método de requisição inválido. Use o formulário para enviar os dados.");
    exit;
}


// Exibe o HTML da página
echo "<!DOCTYPE html>";
echo "<html lang='pt-BR'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Dados Recebidos</title>";
echo "<link rel='stylesheet' href='styles.css'>";
echo "</head>";
echo "<body>";


// Exibe os dados do formulário
displayFormData($nome, $email, $telefone, $mensagem);


// Exibe o cabeçalho da requisição
displayRequestHeaders();


echo "</body>";
echo "</html>";
?>
