# Bài kiểm tra giữa kỳ — PHP lớp 01

**TMU × DEHA** — Môn: Lập trình Web với PHP & MySQL

Đề bài: *Đề kiểm tra giữa kỳ PHP lớp 01.pdf*

---

## Cấu trúc repo

```
.
├── README.md
├── trac-nghiem.txt           <- PHẦN 1: trắc nghiệm (5 câu) — làm bằng file text
├── bai1_is_prime.php         <- PHẦN 2 - Bài 1: kiểm tra số nguyên tố
└── bai2_products.php         <- PHẦN 2 - Bài 2: quản lý sản phẩm (mảng kết hợp)
```

---

## PHẦN 1 — Trắc nghiệm

> Yêu cầu đề: *"trắc nghiệm thì làm vào file text"* → toàn bộ câu hỏi, đáp án và
> giải thích nằm trong [`trac-nghiem.txt`](trac-nghiem.txt).

| Câu | Nội dung | Đáp án |
|:---:|---|:---:|
| 1 | In ra kết quả của hàm đệ quy `fibonacci(5)` | **5** |
| 2 | Phạm vi biến: `echo $var1 + $var2;` trong hàm | **b) 20** |
| 3 | Biến trong PHP bắt đầu bằng ký tự gì | **d) `$`** |
| 4 | Hàm dùng để in ra màn hình | **a) `echo()`** |
| 5 | Khác biệt giữa `==` và `===` | **a)** |

### Hai câu then chốt

**Câu 1** — dãy Fibonacci:

```
fib(0)=0  fib(1)=1
fib(2)=1  fib(3)=2  fib(4)=3  fib(5)=5      =>  echo ra: 5
```

**Câu 2** — bẫy phạm vi biến (variable scope):

```php
$var1 = 10;                     // biến GLOBAL

function myFunction() {
    $var2 = 20;
    echo $var1 + $var2;         // $var1 KHÔNG truy cập được ở đây!
}

myFunction();                   // in ra: 20
```

Trong PHP, biến global **không** tự động vào được bên trong hàm. Muốn dùng phải
khai báo `global $var1;` hoặc `$GLOBALS['var1']`. Đoạn code trên thiếu từ khóa
`global` nên `$var1` bên trong hàm là `NULL` → `NULL + 20 = 20`.
PHP 8 có in kèm `Warning: Undefined variable $var1` nhưng **không** phải Fatal
Error, nên đáp án là **b) 20** chứ không phải d) Error.

Đã chạy thử để kiểm chứng:

```
$ php cau2.php
Warning: Undefined variable $var1 in cau2.php on line 5
20
```

---

## PHẦN 2 — Thực hành

### Bài 1 — Kiểm tra số nguyên tố (`bai1_is_prime.php`)

Yêu cầu:
- Hàm `isPrime` nhận một số nguyên dương, trả về `true` nếu là số nguyên tố,
  `false` nếu không.
- Dùng hàm để hiển thị danh sách số nguyên tố từ 1 đến 100.

```php
function isPrime(int $n) {
    if ($n < 2) return false;
    if ($n < 4) return true;
    if ($n % 2 == 0) return false;
    for ($i = 3; $i * $i <= $n; $i = $i + 2) {
        if ($n % $i == 0) return false;
    }
    return true;
}
```

Kết quả:

```
2 3 5 7 11 13 17 19 23 29 31 37 41 43 47 53 59 61 67 71 73 79 83 89 97
Tổng cộng: 25 số nguyên tố
```

> **Đối chiếu lý thuyết:** có đúng **25** số nguyên tố nhỏ hơn 100 ✔

Cách làm: chỉ thử chia cho các số **lẻ** từ 3, dừng khi `$i * $i > $n` — mọi hợp số
đều có ước nhỏ hơn hoặc bằng căn bậc hai của nó, nên không cần duyệt tới `$n`.

### Bài 2 — Quản lý sản phẩm bằng mảng kết hợp (`bai2_products.php`)

Yêu cầu:
- Mảng kết hợp chứa thông tin sản phẩm với các khóa `name`, `price`, `quantity`.
- Hiển thị thông tin của tất cả sản phẩm trong mảng.
- Viết hàm tính tổng giá trị của tất cả sản phẩm (`price * quantity`).

```php
$products = array(
    array("name" => "Áo thun nam", "price" => 150000, "quantity" => 12),
    array("name" => "Quần jean nữ", "price" => 320000, "quantity" => 7),
    // ...
);

function totalValue($products) {
    $tong = 0;
    foreach ($products as $p) {
        $tong = $tong + $p["price"] * $p["quantity"];
    }
    return $tong;
}
```

Kết quả:

| Tên sản phẩm | Đơn giá | Số lượng |
|---|---:|:---:|
| Áo thun nam | 150000 | 12 |
| Quần jean nữ | 320000 | 7 |
| Giày thể thao | 850000 | 4 |
| Balo học sinh | 240000 | 15 |
| Điện thoại Samsung Galaxy A52 | 6500000 | 3 |

```
Tổng giá trị tất cả sản phẩm: 30540000 VNĐ
```

Kiểm tra: 150000×12 + 320000×7 + 850000×4 + 240000×15 + 6500000×3
= 1.800.000 + 2.240.000 + 3.400.000 + 3.600.000 + 19.500.000
= **30.540.000** ✔

---

## Cách chạy

### XAMPP

1. Cài XAMPP: <https://www.apachefriends.org/>
2. Copy thư mục này vào `C:\xampp\htdocs\midterm-php-lop01\`
3. Bật **Apache** trong XAMPP Control Panel
4. Mở trình duyệt:
   - <http://localhost/midterm-php-lop01/bai1_is_prime.php>
   - <http://localhost/midterm-php-lop01/bai2_products.php>

### Kiểm tra cú pháp

```bash
php -l bai1_is_prime.php
php -l bai2_products.php
```

---

## Môi trường đã kiểm thử

| Mục | Giá trị |
|---|---|
| PHP | 8.3.33 (chạy qua `php -S` như XAMPP) |
| Kiểm tra cú pháp | `php -l` — không lỗi cả 2 file |
| Bài 1 | 25 số nguyên tố từ 1→100 ✔ |
| Bài 2 | tổng 30540000 ✔ |
| Warning / Notice / Fatal | 0 ✔ |
| Câu 1 trắc nghiệm | `5` ✔ |
| Câu 2 trắc nghiệm | `20` (kèm Warning) ✔ |
