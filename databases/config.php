<?php
$conn = mysqli_connect("localhost", "root", "", "cv");
mysqli_set_charset($conn, 'utf8');
if (!$conn) {
	die("Không Thể Kết Nối Vào Cơ Sở Dữ Liệu " . mysqli_connect_error());
}

