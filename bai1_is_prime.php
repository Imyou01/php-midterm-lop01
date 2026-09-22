<?php
/**
 * ============================================================================
 * BÀI 1: KIỂM TRA SỐ NGUYÊN TỐ
 * ----------------------------------------------------------------------------
 * Đề bài:
 *   Viết chương trình PHP kiểm tra xem một số nguyên dương có phải là số
 *   nguyên tố hay không. Yêu cầu:
 *     - Tạo hàm isPrime nhận một số nguyên dương, trả về true nếu là số
 *       nguyên tố, ngược lại trả về false.
 *     - Sử dụng hàm để hiển thị danh sách số nguyên tố từ 1 đến 100.
 *
 * ----------------------------------------------------------------------------
 * KIẾN THỨC SỬ DỤNG:
 *   - Hàm tự định nghĩa, đối số và giá trị trả về (return)
 *   - Type hint cho tham số: function sum(int $x, int $y)
 *   - Biến, biểu thức, nối chuỗi bằng dấu chấm (.)
 *   - Toán tử số học + - * / %, toán tử so sánh == < <=
 *   - Toán tử gán += , toán tử tăng ++
 *   - Cấu trúc điều khiển if / else, vòng lặp for
 *   - Mảng array(), gán theo chỉ số, hàm count(), vòng lặp foreach
 *   - Kết hợp HTML và PHP để hiển thị kết quả
 * ============================================================================
 */

/**
 * Kiểm tra một số nguyên dương có phải số nguyên tố hay không.
 *
 * Số nguyên tố là số tự nhiên lớn hơn 1, chỉ có đúng 2 ước là 1 và chính nó.
 * => 0 và 1 KHÔNG phải số nguyên tố.
 *
 * @param int $n  Số nguyên dương cần kiểm tra
 * @return bool   true nếu $n là số nguyên tố, false nếu không phải
 */
function isPrime(int $n)
{
    // Bước 1: các số nhỏ hơn 2 (0, 1 và số âm) không phải số nguyên tố
    if ($n < 2) {
        return false;
    }

    // Bước 2: 2 và 3 là số nguyên tố
    if ($n < 4) {
        return true;
    }

    // Bước 3: số chẵn lớn hơn 2 đều chia hết cho 2 => không phải số nguyên tố
    if ($n % 2 == 0) {
        return false;
    }

    // Bước 4: chỉ cần thử chia cho các số LẺ từ 3 đến căn bậc hai của $n.
    // Mọi hợp số đều có ít nhất một ước nhỏ hơn hoặc bằng căn bậc hai của nó,
    // nên chỉ cần lặp khi $i * $i <= $n là đủ (nhanh hơn duyệt tới $n).
    for ($i = 3; $i * $i <= $n; $i = $i + 2) {
        if ($n % $i == 0) {
            return false;   // tìm được ước khác 1 và chính nó
        }
    }

    // Bước 5: không tìm được ước nào => là số nguyên tố
    return true;
}

/**
 * Trả về mảng các số nguyên tố trong khoảng từ $tu đến $den.
 *
 * @param int $tu   Số bắt đầu
 * @param int $den  Số kết thúc
 * @return array    Mảng các số nguyên tố tìm được
 */
function getPrimesInRange(int $tu, int $den)
{
    $ketQua = array();   // mảng rỗng
    $dem    = 0;         // biến đếm dùng làm chỉ số mảng

    for ($i = $tu; $i <= $den; $i++) {
        if (isPrime($i)) {
            $ketQua[$dem] = $i;   // gán theo chỉ số
            $dem++;
        }
    }

    return $ketQua;
}

// Lấy danh sách số nguyên tố từ 1 đến 100
$mangNguyenTo = getPrimesInRange(1, 100);
$soLuong      = count($mangNguyenTo);

// Mảng các số dùng để chạy thử
$mangKiemTra = array(0, 1, 2, 3, 4, 9, 11, 17, 25, 97, 100);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 1 - Kiểm tra số nguyên tố</title>
</head>
<body>

<h1>Bài 1 — Kiểm tra số nguyên tố</h1>
<p>
    Hàm <strong>isPrime()</strong> trả về <strong>true</strong> nếu là số nguyên tố,
    ngược lại trả về <strong>false</strong>.
</p>

<!-- ================= 1. Chạy thử một vài giá trị ================= -->
<h2>1. Kiểm tra thử một vài giá trị</h2>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>Số</th>
        <th>Kết quả</th>
        <th>Giải thích</th>
    </tr>

<?php
foreach ($mangKiemTra as $so) {

    // Kiểm tra trước, rồi mới giải thích theo kết quả
    $laNguyenTo = isPrime($so);

    if ($laNguyenTo) {
        // ---- Là số nguyên tố ----
        if ($so == 2) {
            $giaiThich = "số nguyên tố nhỏ nhất, chỉ chia hết cho 1 và 2";
        } elseif ($so == 97) {
            $giaiThich = "số nguyên tố lớn nhất nhỏ hơn 100";
        } else {
            $giaiThich = "chỉ chia hết cho 1 và chính nó";
        }
    } else {
        // ---- Không phải số nguyên tố ----
        if ($so < 2) {
            $giaiThich = "nhỏ hơn 2 nên không phải số nguyên tố";
        } elseif ($so % 2 == 0) {
            $giaiThich = "chia hết cho 2";
        } elseif ($so % 3 == 0) {
            $giaiThich = "chia hết cho 3";
        } elseif ($so % 5 == 0) {
            $giaiThich = "chia hết cho 5";
        } else {
            $giaiThich = "có ước khác 1 và chính nó";
        }
    }

    echo "<tr>";
    echo "<td>" . $so . "</td>";

    if ($laNguyenTo) {
        echo "<td><strong>Là số nguyên tố</strong></td>";
    } else {
        echo "<td>Không phải số nguyên tố</td>";
    }

    echo "<td>" . $giaiThich . "</td>";
    echo "</tr>";
}
?>

</table>

<!-- ============ 2. Danh sách số nguyên tố từ 1 đến 100 ============ -->
<h2>2. Danh sách số nguyên tố từ 1 đến 100</h2>

<?php
echo "<p>";
foreach ($mangNguyenTo as $so) {
    echo $so . " ";
}
echo "</p>";
?>

<p>
    Tổng cộng: <strong><?php echo $soLuong; ?> số nguyên tố</strong>
    (đúng theo lý thuyết: có 25 số nguyên tố nhỏ hơn 100).
</p>

<!-- ============ 3. Bảng 10 dòng, mỗi dòng 10 số từ 1 đến 100 ============ -->
<h2>3. Bảng số từ 1 đến 100 (số nguyên tố in đậm)</h2>

<table border="1" cellpadding="6" cellspacing="0">
<?php
$so = 1;
$dong = 1;

while ($dong <= 10) {
    echo "<tr>";

    $cot = 1;
    while ($cot <= 10) {

        if (isPrime($so)) {
            // số nguyên tố: in đậm
            echo "<td><strong>" . $so . "</strong></td>";
        } else {
            echo "<td>" . $so . "</td>";
        }

        $so++;
        $cot++;
    }

    echo "</tr>";
    $dong++;
}
?>
</table>

</body>
</html>
