<?php
$numero1 = (int) readline("Informe o primeiro número: ");
$numero2 = (int) readline("Informe o segundo número: ");
$operacao =  readline("Escolha uma operação: ");

switch ($operacao) {
    case "+":
        $resultado = $numero1 + $numero2;
        echo "Resultado da soma: " . $resultado . PHP_EOL;
        break;
    case "-":
        $resultado = $numero1 - $numero2;
        echo "Resultado da subtração: " . $resultado . PHP_EOL;
        break;
    case "*":
        $resultado = $numero1 * $numero2;
        echo "Resultado da multiplicação: " . $resultado . PHP_EOL;
        break;
    case "/":
        if ($numero2 != 0) {
            $resultado = $numero1 / $numero2;
            echo "Resultado da divisão: " . number_format($resultado, 2, ',', '.') . PHP_EOL;
        } else {
            echo "Erro: Divisão por zero não é permitida." . PHP_EOL;
        }
        break;
    default:
        echo "Operação inválida." . PHP_EOL;
}