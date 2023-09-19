<?php
function convertToUpperCase($arr)
{
    $result = array();
    foreach ($arr as $item) {
        if (is_string($item)) {
            $result[] = strtoupper($item);
        } else {
            $result[] = $item;
        }
    }
    return $result;
}

$arr1 = ['a', 'b', 'ABC'];
$arr2 = ['1', 'B', 'C', 'E'];
$arr3 = ['a', 0, null, false];

$result1 = convertToUpperCase($arr1);
$result2 = convertToUpperCase($arr2);
$result3 = convertToUpperCase($arr3);

echo "Kết quả cho mảng 1: ";
print_r($result1);

echo "</br>Kết quả cho mảng 2: ";
print_r($result2);

echo "</br>Kết quả cho mảng 3: ";
print_r($result3);
