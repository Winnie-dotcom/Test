<?php
// Kết nối đến MySQL
$conn = new mysqli("localhost", "root", "", "btj");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Dữ liệu đơn hàng
$don_hang = [
    ['1-10-2024 8:43 PM', 1, '0954672157', '89 Lê Lợi, Hải Châu, Đà Nẵng', 0, true, 'Hoàn thành', ''],
    ['9-10-2024 9:24 AM', 2, '0724915976', '78 Đường Lê Lợi, Phường Bến Thành, Quận 1', 0, true, 'Hoàn thành', 'Giao hàng trong giờ hành chính'],
    ['18-10-2024 3:58 AM', 3, '0936452178', '35 Nguyễn Chí Thanh, Thành phố Huế', 30000, false, 'Hoàn thành', ''],
    ['25-10-2024 6:53 PM', 5, '0923456789', '10 Trần Hưng Đạo, Ninh Kiều, Cần Thơ', 30000, false, 'Đã hủy', ''],
    ['5-11-2024 4:16 PM', 6, '0964918527', '42 Nguyễn Huệ, phường Bến Nghé, Quận 1, thành phố Hồ Chí Minh', 0, true, 'Đã giao cho đơn vị vận chuyển', ''],
    ['14-11-2024 1:18 AM', 7, '0764258915', '98 Hoàng Hoa Thám, Ba Đình, Hà Nội', 30000, false, 'Đã giao cho đơn vị vận chuyển', ''],
    ['19-11-2024 5:11 PM', 2, '0724915976', '78 Đường Lê Lợi, Phường Bến Thành, Quận 1', 0, true, 'Đã chuẩn bị hàng', ''],
    ['24-11-2024 2:53 AM', 1, '0954672157', '89 Lê Lợi, Hải Châu, Đà Nẵng', 0, true, 'Đã chuẩn bị hàng', ''],
    ['27-11-2024 7:36 PM', 8, '0901234567', '12 Hùng Vương, Thành phố Nha Trang', 30000, false, 'Đã hủy', ''],
    ['1-12-2024 2:33 PM', 6, '0964918527', '42 Nguyễn Huệ, phường Bến Nghé, Quận 1, thành phố Hồ Chí Minh', 0, true, 'Đã duyệt', ''],
    ['3-12-2024 11:21 PM', 10, '0945678901', '18 Lê Hồng Phong, Quận Ngô Quyền, Hải Phòng', 0, true, 'Đang chờ duyệt', 'Gói thành hộp quà']
];

// Chuẩn bị câu lệnh SQL để chèn dữ liệu vào cơ sở dữ liệu
$stmt = $conn->prepare("INSERT INTO don_hang (thoi_gian, id_khach_hang, so_dien_thoai_giao_hang, dia_chi_giao_hang, phi_ship, freeship, trang_thai, ghi_chu) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// Duyệt qua từng đơn hàng và chèn vào cơ sở dữ liệu
foreach ($don_hang as $don) {
    $stmt->bind_param("sissdiss", $don[0], $don[1], $don[2], $don[3], $don[4], $don[5], $don[6], $don[7]);
    $stmt->execute();
}

// Kiểm tra việc chèn dữ liệu
echo "Dữ liệu đơn hàng đã được thêm thành công!";

// Đóng kết nối
$stmt->close();
$conn->close();
?>
