
<?php
$mensagem = "Preencha o formulário para verificar sua nota.";
$mensagemSoma = "";

$conteudos = [
    "Variáveis",
    "Condições",
    "Repetições",
    "Funções",
    "Formulários"
];

// Função para verificar a situação do estudante
function verificarSituacao($nota) {
    if ($nota >= 6) {
        return "aprovado";
    } elseif ($nota >= 5) {
        return "em recuperação";
    } else {
        return "reprovado";
    }
}

// Função para somar dois valores
function SomaDeDoisValores($number1, $number2) {
    $Soma = $number1 + $number2;
    return $Soma;
}

// Processamento dos formulários
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Verifica se o formulário enviado é o de soma
    if (($_POST["acao"] ?? "") === "somar") {

        $number1 = $_POST["number1"] ?? "";
        $number2 = $_POST["number2"] ?? "";

        if (
            !is_string($number1) ||
            !is_string($number2) ||
            trim($number1) === "" ||
            trim($number2) === "" ||
            !is_numeric($number1) ||
            !is_numeric($number2)
        ) {
            $mensagemSoma = "Digite dois valores numéricos válidos.";
        } else {
            $resultado = SomaDeDoisValores(
                (float) $number1,
                (float) $number2
            );

            $mensagemSoma = "O resultado da soma é: " . $resultado;
        }

    } else {

        // Recebe os dados do formulário de nota
        $nome = $_POST["nome"] ?? "";
        $notaInformada = $_POST["nota"] ?? "";

        if (!is_string($nome) || !is_string($notaInformada)) {
            $mensagem = "Dados inválidos. Preencha novamente.";
        } else {
            $nome = trim($nome);
            $notaInformada = trim($notaInformada);

            // Aceita vírgula ou ponto como separador decimal
            $notaInformada = str_replace(",", ".", $notaInformada);

            if ($nome === "") {
                $mensagem = "Por favor, digite seu nome.";
            } elseif (
                $notaInformada === "" ||
                !is_numeric($notaInformada)
            ) {
                $mensagem = "Digite uma nota numérica entre 0 e 10.";
            } else {
                $nota = (float) $notaInformada;

                if ($nota < 0 || $nota > 10) {
                    $mensagem = "A nota deve estar entre 0 e 10.";
                } else {
                    $situacao = verificarSituacao($nota);

                    $mensagem = "Olá, $nome! Sua nota é $nota. Situação: $situacao.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratório de PHP</title>
</head>

<body>

    <h1>Laboratório de PHP</h1>

    <!-- Formulário para verificar nota -->
    <h2>Verificar nota</h2>

    <form action="index.php" method="post">
        <p>
            <label for="nome">Nome do estudante:</label>
            <input
                type="text"
                id="nome"
                name="nome"
                required
            >
        </p>

        <p>
            <label for="nota">Nota de 0 a 10:</label>
            <input
                type="number"
                id="nota"
                name="nota"
                min="0"
                max="10"
                step="0.1"
                required
            >
        </p>

        <button type="submit">Verificar</button>
    </form>

    <p>
        <?php
        echo htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8");
        ?>
    </p>

    <!-- Formulário para somar dois valores -->
    <h2>Soma de Dois Valores</h2>

    <form action="index.php" method="post">

        <input type="hidden" name="acao" value="somar">

        <p>
            <label for="numero1">Primeiro número:</label>
            <input
                type="number"
                id="numero1"
                name="number1"
                step="any"
                required
            >
        </p>

        <p>
            <label for="numero2">Segundo número:</label>
            <input
                type="number"
                id="numero2"
                name="number2"
                step="any"
                required
            >
        </p>

        <button type="submit">Somar</button>

    </form>

    <p>
        <?php
        echo htmlspecialchars($mensagemSoma, ENT_QUOTES, "UTF-8");
        ?>
    </p>

    <!-- Lista de conteúdos estudados -->
    <h2>Conteúdos estudados</h2>

    <ul>
        <?php
        foreach ($conteudos as $conteudo) {
            echo "<li>" .
                htmlspecialchars($conteudo, ENT_QUOTES, "UTF-8") .
                "</li>";
        }
        ?>
    </ul>

</body>
</html>

