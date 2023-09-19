<?php
$array = [12, 5, 200, 10, 125, 60, 90, 345, -123, 100, -125, 0];
echo "Các số chia hết cho 5 trong khoảng từ 100 đến 200: ";
foreach($array as $i) {
    if($i >= 100 & $i <= 200 & $i % 5 == 0){
        echo $i . ' ';
    }
}