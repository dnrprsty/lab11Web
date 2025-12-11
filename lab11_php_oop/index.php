<?php
include "config.php";
include "class/Database.php";
include "class/Form.php";

session_start();

// Ambil path dari PATH_INFO (modul asli)
if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != "") {
    $path = $_SERVER['PATH_INFO'];
}
// fallback agar DIJAMIN WORK
else if (isset($_GET['path'])) {
    $path = "/" . $_GET['path'];
}
// default modul
else {
    $path = "/artikel/index";
}

// pecah module/page
$segments = explode('/', trim($path, '/'));
$mod  = $segments[0] ?? "artikel";
$page = $segments[1] ?? "index";

// path file modul
$file = "module/{$mod}/{$page}.php";

// include template + module
include "template/header.php";

if (file_exists($file)) {
    include $file;
} else {
    echo "<h3 style='color:red'>Modul tidak ditemukan: $mod/$page</h3>";
}

include "template/footer.php";
?>
