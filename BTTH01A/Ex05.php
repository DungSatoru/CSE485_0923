<?php
$a = [
    'a' => [
        'b' => 0,
        'c' => 1
    ],
    'b' => [
        'e' => 2,
        'o' => [
            'b' => 3
        ]
    ]
];
echo "</br>❖ Hãy lấy giá trị = 3 mà có key là b từ mảng trên: ";
print_r($a['b']['o']['b']);
echo "</br>❖ Hãy lấy giá trị = 1 mà có key là c từ mảng trên: ";
print_r($a['a']['c']);
echo "</br>❖ Hãy lấy thông tin của phần tử có key là a: ";
print_r($a['a']);
