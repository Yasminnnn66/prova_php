
<?php

$numero = readline("Informe um número para a tabuada: ");

if ($numero === "") {
    echo "Você não informou nenhum número." . PHP_EOL;
    return;
}

if (!is_numeric($numero)) {
    echo "Digite apenas números." . PHP_EOL;
    return;
}

$numero = (int) $numero;

for ($multiplicador = 1; $multiplicador <= 10; $multiplicador++) {
    $resultado = $numero * $multiplicador;
    echo "{$numero} x {$multiplicador} = {$resultado}" . PHP_EOL;
}