<h2>Tambah Artikel</h2>

<?php
$form = new Form("/projects/lab11_php_oop/artikel/tambah", "Simpan");
$form->addField("judul", "Judul");
$form->addField("keterangan", "Keterangan", "textarea");

if ($_POST) {
    $db = new Database();
    $db->insert("artikel", [
        "judul" => $_POST["judul"],
        "keterangan" => $_POST["keterangan"]
    ]);
    header("Location: /projects/lab11_php_oop/artikel/index");
    exit;
}
?>

<div class="form">
  <?php $form->displayForm(); ?>
</div>
