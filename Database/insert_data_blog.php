<?php
// Kết nối đến MySQL
$conn = new mysqli("localhost", "root", "", "btj");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Dữ liệu bài viết
$blog_posts = [
['Tại Sao Trang Sức Bạc Là Lựa Chọn Hoàn Hảo Cho Mọi Dịp?', 'Trang sức bạc không chỉ là một món đồ trang trí mà còn là một biểu tượng của sự tinh tế, phong cách và cá tính. Với sự đa dạng về kiểu dáng, giá cả phải chăng và tính năng tuyệt vời, trang sức bạc đã trở thành lựa chọn yêu thích của nhiều người trên toàn thế giới. Hãy cùng khám phá lý do tại sao trang sức bạc lại được ưa chuộng đến vậy!

1. Sự Đa Dạng Trong Thiết Kế
Trang sức bạc mang đến một thế giới thiết kế vô cùng phong phú, từ những mẫu đơn giản, tinh tế cho đến những kiểu dáng cầu kỳ, độc đáo. Bạn có thể dễ dàng tìm thấy:

Nhẫn bạc với phong cách tối giản hoặc đính đá quý rực rỡ.
Dây chuyền bạc mang biểu tượng cá nhân hóa như chữ cái hoặc hình dáng trái tim.
Bông tai bạc thanh lịch phù hợp cho cả công sở và tiệc tối.
Bạc là chất liệu dễ chế tác, giúp các nghệ nhân tự do sáng tạo ra nhiều kiểu dáng mới lạ, đáp ứng mọi phong cách từ cổ điển đến hiện đại.
2. Giá Cả Phải Chăng Nhưng Vẫn Sang Trọng
So với vàng hoặc bạch kim, bạc có giá cả hợp lý hơn nhưng vẫn mang lại vẻ đẹp không kém phần sang trọng. Điều này làm cho trang sức bạc trở thành sự lựa chọn lý tưởng cho những người muốn đầu tư vào phụ kiện mà không cần chi quá nhiều.

3. Lợi Ích Sức Khỏe Và Đặc Tính Kháng Khuẩn
Bạc không chỉ là món trang sức mà còn có tác dụng tốt đối với sức khỏe:

Bạc có đặc tính kháng khuẩn tự nhiên, giúp bảo vệ da khỏi vi khuẩn.
Trang sức bạc có thể hỗ trợ cân bằng năng lượng cơ thể và giảm căng thẳng.
Đeo bạc còn giúp phát hiện vấn đề sức khỏe qua sự thay đổi màu sắc của bạc khi tiếp xúc với hóa chất hoặc môi trường cơ thể.
4. Phù Hợp Với Mọi Dịp Và Đối Tượng
Trang sức bạc có thể phối hợp dễ dàng với mọi loại trang phục và phù hợp với mọi hoàn cảnh:

Hằng ngày: Những mẫu đơn giản cho phong cách nhẹ nhàng.
Dự tiệc: Trang sức bạc đính đá hoặc thiết kế độc đáo để tạo điểm nhấn.
Quà tặng: Lựa chọn tuyệt vời để dành tặng người thân, bạn bè hay người yêu vào những dịp đặc biệt như sinh nhật, kỷ niệm, hoặc lễ hội.
5. Dễ Bảo Quản Và Làm Sạch
Với một vài mẹo nhỏ, bạn có thể giữ trang sức bạc luôn sáng bóng như mới:

Sử dụng khăn mềm để lau chùi.
Bảo quản trong hộp kín hoặc túi chống ẩm để tránh oxy hóa.
Làm sạch bạc định kỳ bằng dung dịch chuyên dụng hoặc hỗn hợp muối, nước và baking soda.
Lời Kết
Trang sức bạc không chỉ là phụ kiện thời trang mà còn là một phần trong câu chuyện phong cách cá nhân của mỗi người. Với vẻ đẹp tinh tế, tính ứng dụng cao và giá trị bền vững, bạc là lựa chọn hoàn hảo cho mọi người, mọi dịp.

Hãy để những món trang sức bạc tôn vinh vẻ đẹp của bạn và là người bạn đồng hành trong cuộc sống hàng ngày!

Bạn có yêu thích trang sức bạc không? Hãy chia sẻ cảm nhận hoặc những kiểu dáng mà bạn yêu thích trong phần bình luận nhé!', 'Nguyễn Ngọc Nhi', '2024-12-01', 'https://cdn.tgdd.vn/Files/2021/01/15/1320413/vi-sao-co-the-du-doan-duoc-tinh-trang-suc-khoe-nho-vao-trang-suc-bac-202101151100480702.jpg']
];
// Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng blog
$stmt = $conn->prepare("INSERT INTO blog (ten_blog, noi_dung, tac_gia, ngay_dang, anh) VALUES (?, ?, ?, ?, ?)");

// Duyệt qua từng bài viết và chèn vào cơ sở dữ liệu
foreach ($blog_posts as $post) {
    // Liên kết các tham số và thực thi câu lệnh
    $stmt->bind_param("sssss", $post[0], $post[1], $post[2], $post[3], $post[4]);
    $stmt->execute();
}

// Kiểm tra việc chèn dữ liệu
echo "Dữ liệu bài viết đã được thêm thành công!";

// Đóng kết nối
$stmt->close();
$conn->close();
?>
