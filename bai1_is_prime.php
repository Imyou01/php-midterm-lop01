<?php

function isPrime(int $n) {
    if ($n < 2) return false;
    if ($n < 4) return true;
    if ($n % 2 == 0) return false;
    for ($i = 3; $i * $i <= $n; $i = $i + 2) {
        if ($n % $i == 0) return false;
    }
    return true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bài 1 - Số nguyên tố</title>
</head>
<body>
<h1>Bài 1: Danh sách số nguyên tố từ 1 đến 100</h1>
<?php
$dem = 0;
for ($i = 1; $i <= 100; $i++) {
    if (isPrime($i)) {
        echo $i . " ";
        $dem++;
    }
}
echo "<p>Tổng cộng: " . $dem . " số nguyên tố</p>";
?>
</body>
</html>
