<?php
include 'ketnoiDatabase.php';

$sql = "SELECT * FROM SanPham";
$result = $conn->query($sql);
?>

<h2>Danh sách sản phẩm</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Hình ảnh</th>
        <th>Mô tả</th>
        <th>Hành động</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['ten'] ?></td>
        <td><?= $row['gia'] ?></td>
        <td><img src="images/<?= $row['hinhanh'] ?>" width="100"></td>
        <td><?= $row['mota'] ?></td>
        <td>
            <a href="suaSanPham.php?id=<?= $row['id'] ?>">Sửa</a>
            <a href="xoaSanPham.php?id=<?= $row['id'] ?>">Xóa</a>
        </td>
    </tr>
    <?php } ?>
</table>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản phẩm</title>
    <link rel="stylesheet" href="style.css">
</head>