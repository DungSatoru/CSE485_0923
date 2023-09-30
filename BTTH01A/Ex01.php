<?php
$arrs = [2, 5, 6, 9, 2, 5, 6, 12, 5];

function Tong($arr)
{
    return array_sum($arr);
}

function Tich($arr)
{
    return array_product($arr);
}

function Hieu($arr)
{
    $result = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        $result -= $arr[$i];
    }
    return $result;
}

function Thuong($arr)
{
    $result = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] == 0) {
            echo "Không thể chia cho 0";
            return;
        }
        $result /= $arr[$i];
    }
    return $result;
}

echo "\nTổng các phần tử = " . implode(" + ", $arrs) . " = " . Tong($arrs) . "</br>";
echo "\nTích các phần tử = " . implode(" * ", $arrs) . " = " . Tich($arrs) . "</br>";
echo "\nHiệu các phần tử = " . implode(" - ", $arrs) . " = " . Hieu($arrs) . "</br>";
echo "\nThương các phần tử = " . implode(" / ", $arrs) . " = " . Thuong($arrs) . "</br>";
