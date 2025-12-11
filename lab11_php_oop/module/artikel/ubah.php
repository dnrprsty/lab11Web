<?php
$id = $_GET['id'] ?? 0;
$db = new Database();
$data = $db->get("artikel", "id=$id");
?>

<h2>Ubah Artikel</h2>

<?php
$form = new Form("/projects/lab11_php_oop/artikel/ubah?id=$id", "Update");
$form->addField("judul", "Judul");
$form->addField("keterangan", "Keterangan", "textarea");

if ($_POST) {
    $db->update("artikel", [
        "judul" => $_POST["judul"],
        "keterangan" => $_POST["keterangan"]
    ], "id=$id");
    header("Location: /projects/lab11_php_oop/artikel/index");
    exit;
}
?>

<div class="form">
  <?php
  // prefill: simple hack — echo html with values
  echo "<label style='display:block;font-weight:600;margin-bottom:6px'>Judul</label>";
  echo "<input type='text' name='judul' value='".htmlspecialchars($data['judul'])."' form='form_update' />";
  ?>
  <?php $form->displayForm(); ?>
</div>
