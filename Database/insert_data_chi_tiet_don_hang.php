<?php
// Kết nối đến MySQL
$conn = new mysqli("localhost", "root", "", "btj");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Dữ liệu chi tiết đơn hàng
$chi_tiet_don_hang = [
    [1, 1, 1, 'Nhẫn Twisted Silver Elegance Ring', 1, 319000],
    [2, 2, 5, 'Vòng cổ Timeless Luminescence Necklace', 1, 569000],
    [3, 2, 3, 'Vòng tay Ethereal Silver Strand', 1, 449000],
    [4, 3, 8, 'Hoa tai Zephyr & Gale', 2, 369000],
    [5, 3, 4, 'Vòng tay Galaxia Lunaire', 1, 599000],
    [6, 4, 6, 'Vòng cổ Floral Fluttering Butterfly Necklace', 2, 549000],
    [7, 5, 2, 'Nhẫn Simple Splendor Ring', 1, 269000],
    [8, 6, 4, 'Vòng tay Galaxia Lunaire', 1, 599000],
    [9, 6, 7, 'Hoa tai Starlight Empowerment', 1, 349000],
    [10, 7, 3, 'Vòng tay Ethereal Silver Strand', 1, 449000],
    [11, 7, 6, 'Vòng cổ Floral Fluttering Butterfly Necklace', 1, 549000],
    [12, 7, 1, 'Nhẫn Twisted Silver Elegance Ring', 1, 319000],
    [13, 8, 2, 'Nhẫn Simple Splendor Ring', 2, 269000],
    [14, 9, 5, 'Vòng cổ Timeless Luminescence Necklace', 2, 569000],
    [15, 9, 8, 'Hoa tai Zephyr & Gale', 2, 369000],
    [16, 10, 2, 'Nhẫn Simple Splendor Ring', 1, 269000],
    [17, 11, 7, 'Hoa tai Starlight Empowerment', 2, 349000],
];

// Chuẩn bị câu lệnh SQL để chèn dữ liệu vào cơ sở dữ liệu
$stmt = $conn->prepare("INSERT INTO chi_tiet_don_hang (id, id_don_hang, id_san_pham, ten_san_pham, so_luong, don_gia) VALUES (?, ?, ?, ?, ?, ?)");

// Duyệt qua từng chi tiết đơn hàng và chèn vào cơ sở dữ liệu
foreach ($chi_tiet_don_hang as $chi_tiet) {
    $stmt->bind_param("iiisid", $chi_tiet[0], $chi_tiet[1], $chi_tiet[2], $chi_tiet[3], $chi_tiet[4], $chi_tiet[5]);
    $stmt->execute();
}

// Kiểm tra việc chèn dữ liệu
echo "Dữ liệu chi tiết đơn hàng đã được thêm thành công!";

// Đóng kết nối
$stmt->close();
$conn->close();
?>
