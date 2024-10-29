<?php
include 'ketnoiDatabase.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM SanPham WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);

    // Kiểm tra và cập nhật hình ảnh
    if ($hinhanh) {
        move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
        $sql = "UPDATE SanPham SET ten='$ten', gia='$gia', hinhanh='$hinhanh', mota='$mota' WHERE id=$id";
    } else {
        $sql = "UPDATE SanPham SET ten='$ten', gia='$gia', mota='$mota' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<form action="suaSanPham.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
    Tên sản phẩm: <input type="text" name="ten" value="<?= $product['ten'] ?>" required><br>
    Giá: <input type="number" name="gia" value="<?= $product['gia'] ?>" required><br>
    Hình ảnh: <input type="file" name="hinhanh"><br>
    Mô tả: <textarea name="mota"><?= $product['mota'] ?></textarea><br>
    <input type="submit" name="submit" value="Cập nhật sản phẩm">
</form>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản phẩm</title>
    <link rel="stylesheet" href="style.css">
</head>