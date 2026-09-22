<?php
/**
 * Trang index — điểm vào của bài kiểm tra giữa kỳ PHP lớp 01
 * Chạy: http://localhost/midterm-php-lop01/
 */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài kiểm tra giữa kỳ PHP - Lớp 01</title>
    <style>
        body {
            font-family: "Segoe UI", Roboto, Arial, sans-serif;
            background: #f4f6f8;
            color: #222;
            margin: 0;
            padding: 40px 16px;
            line-height: 1.65;
        }
        .wrap { max-width: 820px; margin: 0 auto; }
        .card {
            background: #fff;
            border-radius: 12px;
            padding: 28px 32px;
            box-shadow: 0 1px 5px rgba(0,0,0,.08);
        }
        h1 {
            font-size: 26px;
            margin: 0 0 6px;
            border-left: 5px solid #2f6fed;
            padding-left: 14px;
        }
        .sub { color: #666; margin: 0 0 26px; font-size: 14px; }
        h2 { font-size: 16px; color: #2f6fed; margin: 26px 0 10px; }
        ul { list-style: none; padding: 0; margin: 0; }
        li { margin-bottom: 10px; }
        a.item {
            display: block;
            text-decoration: none;
            color: #222;
            background: #f7f9fc;
            border: 1px solid #e3e8f0;
            border-left: 4px solid #2f6fed;
            border-radius: 8px;
            padding: 12px 16px;
            transition: background .15s, transform .15s;
        }
        a.item:hover { background: #eef4ff; transform: translateX(3px); }
        a.item .t { font-weight: 600; }
        a.item .d { font-size: 13px; color: #666; }
        .tag {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
            padding: 2px 8px;
            border-radius: 4px;
            background: #e8f0ff;
            color: #1a4fbf;
            margin-left: 8px;
            vertical-align: middle;
        }
        .meta {
            margin-top: 26px;
            padding-top: 16px;
            border-top: 1px dashed #dde3ec;
            font-size: 13px;
            color: #666;
        }
        code {
            background: #f0f3f7;
            padding: 1px 6px;
            border-radius: 4px;
            font-size: 13px;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="card">

        <h1>Bài kiểm tra giữa kỳ — PHP lớp 01</h1>
        <p class="sub">TMU &times; DEHA &mdash; Môn Lập trình Web với PHP &amp; MySQL</p>

        <h2>Phần 1 — Trắc nghiệm (5 câu)</h2>
        <ul>
            <li>
                <a class="item" href="trac-nghiem.txt">
                    <span class="t">trac-nghiem.txt</span>
                    <span class="tag">Text</span>
                    <div class="d">
                        Câu 1 → 5: fibonacci(5), phạm vi biến, ký tự khai báo biến,
                        hàm xuất màn hình, <code>==</code> vs <code>===</code>
                    </div>
                </a>
            </li>
        </ul>

        <h2>Phần 2 — Thực hành (2 bài)</h2>
        <ul>
            <li>
                <a class="item" href="bai1_is_prime.php">
                    <span class="t">Bài 1 — Kiểm tra số nguyên tố</span>
                    <span class="tag">PHP</span>
                    <div class="d">
                        Hàm <code>isPrime(int $n): bool</code> + in danh sách
                        số nguyên tố từ 1 đến 100
                    </div>
                </a>
            </li>
            <li>
                <a class="item" href="bai2_products.php">
                    <span class="t">Bài 2 — Quản lý sản phẩm (mảng kết hợp)</span>
                    <span class="tag">PHP</span>
                    <div class="d">
                        Mảng kết hợp <code>name</code> / <code>price</code> /
                        <code>quantity</code> + hàm <code>totalValue()</code>
                        tính tổng giá trị
                    </div>
                </a>
            </li>
        </ul>

        <div class="meta">
            <strong>Cách chạy:</strong> copy thư mục này vào <code>htdocs</code> của
            XAMPP, bật Apache, rồi mở
            <code>http://localhost/midterm-php-lop01/</code>.<br>
            Hai file bài làm xuất HTML trực tiếp ra trình duyệt.
        </div>

    </div>
</div>
</body>
</html>
