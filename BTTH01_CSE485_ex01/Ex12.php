<?php
$numbers = [
    'key1' => 12,
    'key2' => 30,
    'key3' => 4,
    'key4' => -123,
    'key5' => 1234,
    'key6' => -12565,
];

echo "</br>❖ Phần tử đầu tiên (" . reset($numbers) . "), phần tử cuối cùng (" . end($numbers) . ")";
echo "</br>❖ Số lớn nhất (" . max($numbers) . "), số nhỏ nhất (" . min($numbers) . "), tổng các giá trị từ mảng trên (" . array_sum($numbers) . ")";
echo "</br>❖ Sắp xếp mảng theo chiều tăng, giảm các giá trị";
echo "</br>❖ Sắp xếp mảng theo chiều tăng, giảm các key";
