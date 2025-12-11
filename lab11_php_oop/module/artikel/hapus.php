<?php
$id = $_GET['id'] ?? 0;

$db = new Database();

// Hapus data
$db->delete("artikel", "id=$id");

// Arahkan kembali
header("Location: /projects/lab11_php_oop/artikel/index");
exit;
?>
