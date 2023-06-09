<?php

$products = [
    [
        'name' => 'product1',
        'price' => 100,
        'amount' => 5,
    ],
    [
        'name' => 'product2',
        'price' => 200,
        'amount' => 6,
    ],
    [
        'name' => 'product3',
        'price' => 300,
        'amount' => 7,
    ],
];
echo "<table class=\"table\">";
$thead = array_keys($products[0]);
foreach ($thead as $th) {
    echo "<th>$th</th>";
}
foreach ($products as $row) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>$cell</td>";
    }
    echo "</tr>";
};
echo "</table>";
