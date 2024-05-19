<?php
include 'koneksi.php';

$query = "SELECT * FROM mahasiswa";
$data_json = array();

try {
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        $data_json = $result;
    } else {
        $data_json["error"] = "Tidak ada data yang ditemukan.";
    }
} catch(PDOException $e) {
    $data_json["error"] = "Query gagal: " . $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($data_json, JSON_PRETTY_PRINT);

$conn = null;
?>
