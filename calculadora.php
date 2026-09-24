<?php

$input1 = readline("Informe o primeiro número: ");
$input2 = readline("Informe o segundo número: ");

// Valida se as entradas são números reais
if (!is_numeric($input1) || !is_numeric($input2)) {
    echo "Erro: Informe apenas números válidos." . PHP_EOL;
    exit;
}

$numero1 = (float) $input1;
$numero2 = (float) $input2;

$operacao = readline("Escolha uma operação : ");

switch ($operacao) {
    case '+':
        $resultado = $numero1 + $numero2;
        echo "Resultado da soma: " . $resultado . PHP_EOL;
        break;
    case '-':
        $resultado = $numero1 - $numero2;
        echo "Resultado da subtração: " . $resultado . PHP_EOL;
        break;
    case '*':
        $resultado = $numero1 * $numero2;
        echo "Resultado da multiplicação: " . $resultado . PHP_EOL;
        break;
    case '/':
        if ($numero2 != 0) {
            $resultado = $numero1 / $numero2;
            echo "Resultado da divisão: " . number_format($resultado, 2, ',', '.') . PHP_EOL;
        } else {
            echo "Não é possível realizar a divisão por zero." . PHP_EOL;
        }
        break;
    default:
        echo "Operação inválida." . PHP_EOL;
}