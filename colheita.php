<?php

function classificarProducao(float $valorTotal): string
{
    if ($valorTotal < 5000) {
        return "PRODUÇÃO DE PEQUENO PORTE.";
    }

    if ($valorTotal >= 5000 && $valorTotal <= 19999) {
        return "PRODUÇÃO DE MÉDIO PORTE.";
    }

    return "PRODUÇÃO DE GRANDE PORTE.";
}

function exibirResumoCultura(string $cultura, float $quantidade, float $valorKg, float $valorTotal): void
{
    echo "================================" . PHP_EOL;
    echo "      RESUMO COLHEITA" . PHP_EOL;
    echo "================================" . PHP_EOL;

    echo "Cultura: {$cultura}" . PHP_EOL;
    echo "Quantidade: " . number_format($quantidade, 2, ',', '.') . " kg" . PHP_EOL;
    echo "Valor por kg: " . number_format($valorKg, 2, ',', '.') . PHP_EOL;
    echo "Valor total: " . number_format($valorTotal, 2, ',', '.') . PHP_EOL;
    echo PHP_EOL;
}

function exibirResumoGeral(int $codigo, int $data, string $responsavel, int $qtdCulturas, float $quantidadeTotal, float $valorTotal): void
{
    echo "================================" . PHP_EOL;
    echo "    RESUMO GERAL DA COLHEITA" . PHP_EOL;
    echo "================================" . PHP_EOL;

    echo "Código da colheita: {$codigo}" . PHP_EOL;
    echo "Data: {$data}" . PHP_EOL;
    echo "Responsável: {$responsavel}" . PHP_EOL;
    echo "Quantidade de culturas: {$qtdCulturas}" . PHP_EOL;
    echo "Quantidade total produzida: " . number_format($quantidadeTotal, 2, ',', '.') . " kg" . PHP_EOL;
    echo "Valor total estimado da colheita: " . number_format($valorTotal, 2, ',', '.') . PHP_EOL;
    echo classificarProducao($valorTotal) . PHP_EOL;
}

function processarColheita(int $colheita, int $data, string $responsavel, int $qtdCultura): void
{
    if ($qtdCultura <= 0) {
        echo "Quantidade inválida" . PHP_EOL;
        return;
    }

    $quantidadeTotal = 0.0;
    $valorTotalColheita = 0.0;

    for ($i = 0; $i < $qtdCultura; $i++) {
        $cultura = readline("Informe a cultura: ");
        $quantidade = (float) readline("Informe a quantidade produzida em kg: ");
        $valorKg = (float) readline("Informe o valor estimado de venda (kg): ");

        $valorTotal = $quantidade * $valorKg;
        $quantidadeTotal += $quantidade;
        $valorTotalColheita += $valorTotal;

        exibirResumoCultura($cultura, $quantidade, $valorKg, $valorTotal);
    }

    exibirResumoGeral($colheita, $data, $responsavel, $qtdCultura, $quantidadeTotal, $valorTotalColheita);
}

$colheita = (int) readline("Informe qual é a colheita: ");
$data = (int) readline("Data atual: ");
$responsavel = readline("Responsável pelo lançamento: ");
$qtdCultura = (int) readline("Quantidade de cultura: ");

processarColheita($colheita, $data, $responsavel, $qtdCultura);