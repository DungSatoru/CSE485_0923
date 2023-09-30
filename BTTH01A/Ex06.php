<?php

$keys = array(
    "field1" => "first",
    "field2" => "second",
    "field3" => "third"
);
$values = array(
    "field1value" => "dinosaur",
    "field2value" => "pig",
    "field3value" => "platypus"
);

$keysAndValues = array();

foreach ($keys as $key => $keyName) {
    // Tạo key và value trong mảng kết quả
    $keysAndValues[$keyName] = $values[$key . 'value'];
}

print_r($keysAndValues);
