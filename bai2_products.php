<?php

$products = array(
    array("name" => "Áo thun nam", "price" => 150000, "quantity" => 12),
    array("name" => "Quần jean nữ", "price" => 320000, "quantity" => 7),
    array("name" => "Giày thể thao", "price" => 850000, "quantity" => 4),
    array("name" => "Balo học sinh", "price" => 240000, "quantity" => 15),
    array("name" => "Điện thoại Samsung Galaxy A52", "price" => 6500000, "quantity" => 3)
);

function totalValue($products) {
    $tong = 0;
    foreach ($products as $p) {
        $tong = $tong + $p["price"] * $p["quantity"];
    }
    return $tong;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bài 2 - Quản lý sản phẩm</title>
</head>
<body>
<h1>Bài 2: Danh sách sản phẩm</h1>
<table border="1" cellpadding="6">
<tr>
    <th>Tên sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
</tr>
<?php
foreach ($products as $p) {
    echo "<tr>";
    echo "<td>" . $p["name"] . "</td>";
    echo "<td>" . $p["price"] . "</td>";
    echo "<td>" . $p["quantity"] . "</td>";
    echo "</tr>";
}
?>
</table>
<p>Tổng giá trị tất cả sản phẩm: <?php echo totalValue($products); ?> VNĐ</p>
</body>
</html>
