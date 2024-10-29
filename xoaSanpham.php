<?php
include 'ketnoiDatabase.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM SanPham WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Xóa thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
