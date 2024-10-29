<?php
include 'ketnoiDatabase.php';

if (isset($_POST['submit'])) {
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);

    // Upload hình ảnh
    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO SanPham (ten, gia, hinhanh, mota) VALUES ('$ten', '$gia', '$hinhanh', '$mota')";
        if ($conn->query($sql) === TRUE) {
            echo "Thêm sản phẩm thành công";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "Lỗi khi tải ảnh lên.";
    }
}
?>

<form action="themSanPham.php" method="POST" enctype="multipart/form-data">
    Tên sản phẩm: <input type="text" name="ten" required><br>
    Giá: <input type="number" name="gia" required><br>
    Hình ảnh: <input type="file" name="hinhanh" required><br>
    Mô tả: <textarea name="mota"></textarea><br>
    <input type="submit" name="submit" value="Thêm sản phẩm">
</form>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản phẩm</title>
    <link rel="stylesheet" href="style.css">
</head>
<a href="trangChu.php">Quay lại Trang Chủ</a>