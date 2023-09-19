<?php
$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];
$maxLength = strlen($array[0]);
$minLength = strlen($array[0]);
$maxString = $array[0];
$minString = $array[0];
foreach ($array as $str) {
    $length = strlen($str);
    if ($length > $maxLength) {
        $maxLength = $length;
        $maxString = $str;
    }
    if ($length < $minLength) {
        $minLength = $length;
        $minString = $str;
    }
}
// In kết quả
echo "Chuỗi lớn nhất là $maxString, độ dài = $maxLength<br>";
echo "Chuỗi nhỏ nhất là $minString, độ dài = $minLength";