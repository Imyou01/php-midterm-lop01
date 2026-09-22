<?php
/**
 * ============================================================================
 * BÀI 2: QUẢN LÝ SẢN PHẨM BẰNG MẢNG KẾT HỢP
 * ----------------------------------------------------------------------------
 * Đề bài:
 *   Viết ứng dụng PHP quản lý thông tin sản phẩm trong một cửa hàng, sử dụng
 *   mảng kết hợp. Yêu cầu:
 *     - Tạo một mảng kết hợp chứa thông tin sản phẩm với các khóa như
 *       name, price, quantity.
 *     - Hiển thị thông tin của tất cả sản phẩm trong mảng.
 *     - Viết hàm tính tổng giá trị của tất cả sản phẩm (price * quantity).
 *
 * ----------------------------------------------------------------------------
 * KIẾN THỨC SỬ DỤNG:
 *   - Mảng array(), mảng kết hợp (khóa => giá trị), mảng đa chiều
 *   - Truy cập phần tử mảng kết hợp: $sp["price"]
 *   - Hàm tự định nghĩa, đối số và giá trị trả về (return)
 *   - Type hint cho tham số: function sum(int $x, int $y)
 *   - Vòng lặp foreach (chỉ chạy trên mảng)
 *   - Hàm count() đếm số phần tử của mảng
 *   - Toán tử số học + * %, so sánh == > >= , gán =
 *   - Cấu trúc if / elseif / else, nối chuỗi bằng dấu chấm (.)
 *   - Kết hợp HTML và PHP để hiển thị bảng
 * ============================================================================
 */

/* --------------------------------------------------------------------------
 * 1. DỮ LIỆU
 *    Mảng kết hợp $products: mỗi phần tử là MỘT sản phẩm, bản thân sản phẩm
 *    cũng là một mảng kết hợp với 3 khóa: name, price, quantity.
 *    (Đây chính là dạng MẢNG ĐA CHIỀU)
 * ------------------------------------------------------------------------ */
$products = array(
    array(
        "name"     => "Áo thun nam",
        "price"    => 150000,
        "quantity" => 12
    ),
    array(
        "name"     => "Quần jean nữ",
        "price"    => 320000,
        "quantity" => 7
    ),
    array(
        "name"     => "Giày thể thao",
        "price"    => 850000,
        "quantity" => 4
    ),
    array(
        "name"     => "Balo học sinh",
        "price"    => 240000,
        "quantity" => 15
    ),
    array(
        "name"     => "Điện thoại Samsung Galaxy A52",
        "price"    => 6500000,
        "quantity" => 3
    ),
    array(
        "name"     => "Tai nghe Bluetooth",
        "price"    => 490000,
        "quantity" => 9
    )
);

/* --------------------------------------------------------------------------
 * 2. CÁC HÀM XỬ LÝ
 * ------------------------------------------------------------------------ */

/**
 * Tính thành tiền của MỘT sản phẩm = price * quantity.
 *
 * @param array $sanPham  Mảng kết hợp chứa name, price, quantity
 * @return int            Thành tiền
 */
function lineTotal($sanPham)
{
    return $sanPham["price"] * $sanPham["quantity"];
}

/**
 * Tính TỔNG giá trị của TẤT CẢ sản phẩm trong mảng.
 * Công thức: tổng = Σ(price × quantity)
 *
 * @param array $danhSach  Mảng các sản phẩm
 * @return int             Tổng giá trị
 */
function totalValue($danhSach)
{
    $tong = 0;

    foreach ($danhSach as $sanPham) {
        // Cộng dồn thành tiền của từng sản phẩm
        $tong = $tong + ($sanPham["price"] * $sanPham["quantity"]);
    }

    return $tong;
}

/**
 * Tính tổng SỐ LƯỢNG hàng trong kho.
 *
 * @param array $danhSach
 * @return int
 */
function totalQuantity($danhSach)
{
    $tong = 0;

    foreach ($danhSach as $sanPham) {
        $tong = $tong + $sanPham["quantity"];
    }

    return $tong;
}

/**
 * Tìm sản phẩm có thành tiền cao nhất.
 *
 * @param array $danhSach
 * @return array  Sản phẩm có thành tiền lớn nhất
 */
function mostValuableProduct($danhSach)
{
    $totNhat = $danhSach[0];

    foreach ($danhSach as $sanPham) {
        if (lineTotal($sanPham) > lineTotal($totNhat)) {
            $totNhat = $sanPham;
        }
    }

    return $totNhat;
}

/**
 * Kiểm tra mỗi sản phẩm có đủ 3 khóa name, price, quantity hay không.
 * Dùng foreach, toán tử so sánh và break.
 *
 * @param array $danhSach
 * @return bool  true nếu TẤT CẢ sản phẩm đều hợp lệ
 */
function kiemTraDuLieu($danhSach)
{
    $khoaCanCo = array("name", "price", "quantity");

    foreach ($danhSach as $sanPham) {

        foreach ($khoaCanCo as $khoaCan) {

            $timThay = false;

            // Duyệt các khóa thực có của sản phẩm để so sánh
            foreach ($sanPham as $khoa => $giaTri) {
                if ($khoa == $khoaCan) {
                    $timThay = true;
                    break;
                }
            }

            if ($timThay == false) {
                return false;   // thiếu khóa -> dữ liệu không hợp lệ
            }
        }
    }

    return true;
}

/**
 * Thêm dấu chấm phân cách hàng nghìn cho số tiền.
 * Ví dụ: 34950000 -> "34.950.000"
 *
 * Cách làm: tách từng chữ số bằng toán tử % và /, duyệt bằng
 * vòng lặp while, cứ 3 chữ số thì chèn thêm một dấu chấm.
 *
 * @param int $so  Số tiền cần định dạng
 * @return string  Chuỗi số tiền đã có dấu chấm
 */
function formatVnd($so)
{
    if ($so == 0) {
        return "0";
    }

    $chuoi  = "";
    $dem    = 0;

    while ($so > 0) {

        $chuSo = $so % 10;                  // lấy chữ số cuối cùng
        $so    = ($so - $chuSo) / 10;       // bỏ chữ số cuối cùng

        // Cứ sau 3 chữ số thì chèn thêm một dấu chấm
        if ($dem > 0 && $dem % 3 == 0) {
            $chuoi = "." . $chuoi;
        }

        $chuoi = $chuSo . $chuoi;
        $dem++;
    }

    return $chuoi;
}

/* ==========================================================================
 * 3. TÍNH TOÁN
 * ======================================================================== */

$duLieuHopLe  = kiemTraDuLieu($products);
$grandTotal   = totalValue($products);
$tongSoLuong  = totalQuantity($products);
$sanPhamTop   = mostValuableProduct($products);
$soSanPham    = count($products);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 2 - Quản lý sản phẩm</title>
</head>
<body>

<h1>Bài 2 — Quản lý sản phẩm bằng mảng kết hợp</h1>

<p>
    Mỗi sản phẩm là một mảng kết hợp gồm 3 khóa
    <strong>name</strong>, <strong>price</strong>, <strong>quantity</strong>.
    Hàm <strong>totalValue()</strong> tính tổng giá trị = tổng của
    (price × quantity).
</p>

<!-- ================= 0. Kiểm tra dữ liệu ================= -->
<h2>0. Kiểm tra dữ liệu đầu vào</h2>

<?php
if ($duLieuHopLe) {
    echo "<p>Dữ liệu hợp lệ: có " . $soSanPham . " sản phẩm, mỗi sản phẩm";
    echo " đều có đủ 3 khóa name, price, quantity.</p>";
} else {
    echo "<p>Dữ liệu KHÔNG hợp lệ: có sản phẩm thiếu khóa.</p>";
}
?>

<!-- ================= 1. Hiển thị tất cả sản phẩm ================= -->
<h2>1. Thông tin tất cả sản phẩm</h2>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm (name)</th>
        <th>Đơn giá (price)</th>
        <th>Số lượng (quantity)</th>
        <th>Thành tiền</th>
    </tr>

<?php
$stt = 1;

foreach ($products as $sanPham) {

    echo "<tr>";
    echo "<td>" . $stt . "</td>";
    echo "<td>" . $sanPham["name"] . "</td>";
    echo "<td>" . formatVnd($sanPham["price"]) . " đ</td>";
    echo "<td>" . $sanPham["quantity"] . "</td>";
    echo "<td>" . formatVnd(lineTotal($sanPham)) . " đ</td>";
    echo "</tr>";

    $stt++;
}
?>

    <tr>
        <td colspan="3"><strong>TỔNG CỘNG</strong></td>
        <td><strong><?php echo $tongSoLuong; ?></strong></td>
        <td><strong><?php echo formatVnd($grandTotal); ?> đ</strong></td>
    </tr>
</table>

<!-- ================= 2. Tổng giá trị ================= -->
<h2>2. Tổng giá trị của tất cả sản phẩm — hàm totalValue()</h2>

<ul>
    <li>Số mặt hàng: <strong><?php echo $soSanPham; ?></strong></li>
    <li>Tổng số lượng trong kho: <strong><?php echo $tongSoLuong; ?></strong></li>
    <li>
        <strong>TỔNG GIÁ TRỊ (price × quantity):
        <?php echo formatVnd($grandTotal); ?> VNĐ</strong>
    </li>
    <li>
        Sản phẩm có giá trị cao nhất:
        <strong><?php echo $sanPhamTop["name"]; ?></strong>
        — <?php echo formatVnd(lineTotal($sanPhamTop)); ?> VNĐ
    </li>
</ul>

<?php
// In ra phép tính đầy đủ để dễ kiểm tra
echo "<p>Công thức: tổng = ";
$chuoiPhepTinh = "";
$dauTien = true;

foreach ($products as $sanPham) {

    if ($dauTien) {
        $dauTien = false;
    } else {
        $chuoiPhepTinh = $chuoiPhepTinh . " + ";
    }

    $chuoiPhepTinh = $chuoiPhepTinh
        . formatVnd($sanPham["price"])
        . " x "
        . $sanPham["quantity"];
}

echo $chuoiPhepTinh;
echo " = <strong>" . formatVnd($grandTotal) . "</strong></p>";
?>

</body>
</html>
