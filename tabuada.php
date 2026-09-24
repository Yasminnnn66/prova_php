<?php

$numero = (int) readline("Informe um número para a tabuada: ");

for ($multiplicador = 1; $multiplicador <= 10; $multiplicador++) {
	$resultado = $numero * $multiplicador;
	echo "{$numero} x {$multiplicador} = {$resultado}" . PHP_EOL;
}