<?php
// echo envia um texto para a página
echo "Olá, mundo!";
echo "<br>"; // A tag HTML br cria uma quebra de linha no navegador
echo "Bem-vindo à aula de PHP!" . "<br>";

// Comentário de uma linha

/*
Comentário com
mais de uma linha.
*/

$nome = "Thaila"; // Guarda um texto
$idade = 18;   // Guarda um número

$idade = 19; // Altera o valor da variável

// Uma constante guarda um valor que não será alterado
const curso = "Desenvolvimento Web";

echo "Nome: $nome<br>";
echo "Idade: $idade<br>";
echo "Curso: " . curso;

$aluno = "Caio"; // string: texto.
$idade = 18; // int: número inteiro.
$nota = 3.5; // float: número decimal, escrito com ponto.
$aprovado = "true"; // bool: verdadeiro ou falso.
$telefone = "null"; // null: ausência de valor.

// Mostra o tipo e o valor de cada variável
echo "<pre>"; // Preserva a formatação da saída no navegador
var_dump($aluno, $idade, $nota, $aprovado, $telefone);
echo "</pre>";

/* O var_dump() ajuda a conferir valores durante o estudo. Por exemplo, var_dump($idade) mostra int(20). Para valores lógicos, ele mostra bool(true) ou bool(false). */

$numero1 = 10;
$numero2 = 4;

// Em PHP, o ponto . junta textos. Essa operação se chama concatenação.

echo "_________________________________________________" . "<br>" . "<br>";
echo ("Soma: " . $numero1 + $numero2) ."<br>";
echo ("Subtração: " . $numero1 - $numero2) ."<br>";
echo ("Multiplicação: " . $numero1 * $numero2) ."<br>";
echo ("Divisão: " . $numero1 / $numero2) ."<br>";
echo ("Divisão com resto inteiro: ". $numero1 % $numero2) ."<br>";
echo ("Potênciação: ". $numero1 ** 2) ."<br>";
echo "_________________________________________________" . "<br>" . "<br>";
// Em PHP, o ponto . junta textos. Essa operação se chama concatenação.

$nome = "Marina";
$idade = 20;

echo "Olá, " . $nome . "!<br>";

// Aspas duplas permitem inserir variáveis diretamente no texto
echo "$nome tem $idade anos.<br>";

// Aspas simples mantêm o texto literal
echo 'A variável se chama $nome.' . "<br>";
echo "_________________________________________________" . "<br>" . "<br>";

/* Comparações produzem true ou false. Use var_dump() para visualizar esses resultados com clareza. */

$idade2 = 19;

echo "<pre>";
var_dump ($idade > 17);
var_dump ($idade < 18); 
var_dump ($idade >= 18);
var_dump ($idade <= 20);
var_dump ($idade === 19);
var_dump ($idade !== 18); 

?>