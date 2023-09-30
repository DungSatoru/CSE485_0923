<?php
$numbers = array(
    'key1' => 12,
    'key2' => 30,
    'key3' => 4,
    'key4' => -123,
    'key5' => 1234,
    'key6' => -12565,
);

echo 'Phần tử đầu tiên của mảng' . reset($numbers) . '<br>';
echo 'Phần tử cuối cùng của mảng: ' . end($numbers) . '<br>';
echo 'Phần tử lon nhất của mảng: ' . max($numbers) . '<br>';
echo 'Phần tử nho nhất của mảng: ' . min($numbers) . '<br>';
echo 'Tổng các giá trị của mảng: ' . array_sum($numbers) . '<br>';
asort($numbers);
echo '<br>Sắp xếp tăng (value): ';
foreach ($numbers as $s_value) {
    echo $s_value . '; ';
}
ksort($numbers);
echo '<br>Sắp xếp tăng (key)';
foreach ($numbers as $s) {
    echo $s . '; ';
}
arsort($numbers);
echo '<br>Sắp xếp giảm (value): ';
foreach ($numbers as $s_value) {
    echo $s_value . '; ';
}
krsort($numbers);
echo '<br>Sắp xếp giảm (key)';
foreach ($numbers as $s) {
    echo $s . '; ';
}
