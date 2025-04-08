<?php
include 'connection.php';

$tanggal = $_POST['tanggal'];
$id_sales = $_POST['sales'];
$id_produk = $_POST['produk'];
$no_wa = $_POST['whatsapp'];
$nama_lead = $_POST['namaLead'];
$kota = $_POST['kota'];

$id_user = 1;

$query = "INSERT INTO leads (tanggal, id_sales, id_produk, no_wa, nama_lead, kota, id_user) VALUES ('$tanggal', '$id_sales', '$id_produk', '$no_wa', '$nama_lead', '$kota', '$id_user')";

if ($conn->query($query) === TRUE) {
    echo "Data submitted successfully. <a href='index.php' class='btn btn-secondary mb-4'>Kembali</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>