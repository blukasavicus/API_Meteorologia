<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando API para verificação meteorológica</title>
</head>
<body>
    <h1>API</h1>
    <form method="post">
        <label>CIDADE:</label>
        <input type="text" name="cidade" id="cidade">
        <button type="submit">VERIFICAR</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cidade = $_POST['cidade'];
        $api_key = "5fef0d79be574a0f916154519241008"; 
        $url = "http://api.weatherapi.com/v1/current.json?key=$api_key&q=$cidade&aqi=no";
        $json = file_get_contents($url);
        $dados = json_decode($json, true);

        if (isset($dados['current'])) {
            echo "<h2>Previsão do tempo para " . ($cidade) . ":</h2>";
            echo "<p>Temperatura: " . $dados['current']['temp_c'] . "°C </p>";
            echo "<p>Umidade: " . $dados['current']['humidity'] . "% </p>";
            echo "<p>Condição: " . $dados['current']['condition']['text'] . "</p>";
        }
    }
    ?>
</body>
</html>