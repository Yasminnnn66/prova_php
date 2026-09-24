<?php

// classifica a produção com base no valor total
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

// exibe o resumo da cultura
function exibirResumoCultura(string $cultura, float $quantidade, float $valorKg, float $valorTotal)
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

// exibe o resumo geral da colheita
function exibirResumoGeral(
    int $idColheita,
    string $data,
    string $responsavel,
    int $qtdCulturas,
    float $quantidadeTotal,
    float $valorTotal
) {
    echo "================================" . PHP_EOL;
    echo "    RESUMO GERAL DA COLHEITA" . PHP_EOL;
    echo "================================" . PHP_EOL;

    echo "ID da colheita: {$idColheita}" . PHP_EOL;
    echo "Data: {$data}" . PHP_EOL;
    echo "Responsável: {$responsavel}" . PHP_EOL;
    echo "Quantidade de culturas: {$qtdCulturas}" . PHP_EOL;
    echo "Quantidade total produzida: " . number_format($quantidadeTotal, 2, ',', '.') . " kg" . PHP_EOL;
    echo "Valor total estimado da colheita: " . number_format($valorTotal, 2, ',', '.') . PHP_EOL;
    echo classificarProducao($valorTotal) . PHP_EOL;
}

// processa a colheita
function processarColheita(
    int $idColheita,
    string $data,
    string $responsavel,
    int $qtdCultura
) {
    $quantidadeTotal = 0;
    $valorTotalColheita = 0;

    for ($i = 0; $i < $qtdCultura; $i++) {

        $cultura = readline("Informe a cultura: ");

        if ($cultura === "") {
            echo "A cultura não pode ficar vazia." . PHP_EOL;
            return;
        }

        $quantidade = readline("Informe a quantidade produzida em kg: ");

        if ($quantidade === "" || !is_numeric($quantidade) || $quantidade <= 0) {
            echo "Quantidade inválida." . PHP_EOL;
            return;
        }

        $valorKg = readline("Informe o valor estimado de venda (kg): ");

        if ($valorKg === "" || !is_numeric($valorKg) || $valorKg <= 0) {
            echo "Valor por kg inválido." . PHP_EOL;
            return;
        }

        $quantidade = (float) $quantidade;
        $valorKg = (float) $valorKg;

        $valorTotal = $quantidade * $valorKg;

        $quantidadeTotal += $quantidade;
        $valorTotalColheita += $valorTotal;

        exibirResumoCultura($cultura, $quantidade, $valorKg, $valorTotal);
    }

    exibirResumoGeral(
        $idColheita,
        $data,
        $responsavel,
        $qtdCultura,
        $quantidadeTotal,
        $valorTotalColheita
    );
}

// entrada dos dados
$idColheita = readline("Informe o ID da colheita: ");

if ($idColheita === "" || !is_numeric($idColheita)) {
    echo "ID da colheita inválido." . PHP_EOL;
    return;
}

$idColheita = (int) $idColheita;

$data = readline("Data atual: ");

if ($data === "") {
    echo "A data não pode ficar vazia." . PHP_EOL;
    return;
}

$responsavel = readline("Responsável pelo lançamento: ");

if ($responsavel === "") {
    echo "O responsável não pode ficar vazio." . PHP_EOL;
    return;
}

$qtdCultura = readline("Quantidade de cultura: ");

if ($qtdCultura === "" || !is_numeric($qtdCultura) || $qtdCultura <= 0) {
    echo "Quantidade de culturas inválida." . PHP_EOL;
    return;
}

$qtdCultura = (int) $qtdCultura;

processarColheita(
    $idColheita,
    $data,
    $responsavel,
    $qtdCultura
);
