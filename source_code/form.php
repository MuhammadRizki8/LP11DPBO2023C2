<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/FormPasien.php");

$tp = new FormPasien();

if (isset($_POST['add'])) {
    $tp->tambahPasien($_POST);
    header('location: index.php');

}
else if (isset($_GET['id_delete'])) {
    $tp->hapusPasien($_GET['id_delete']);
    header('location: index.php');

}else if (isset($_GET['id_edit']) && isset($_POST['update'])) {
    $tp->ubahPasien($_GET['id_edit'], $_POST);
    header('location: index.php');

}else if (isset($_GET['id_edit'])) {
    $tp->tampil_data_edit($_GET['id_edit']);

}else {
    $tp->tampil();
}

?>