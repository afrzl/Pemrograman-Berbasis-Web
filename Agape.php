<?php
include 'dbconn.php';
try {
    // Menambahkan query select
    $keyword = "%" . $_GET["keyword"] . "%"; // Menambahkan wildcard untuk pencarian

    // Mempersiapkan statement
    $stmt = $pdo->prepare("SELECT nama FROM peminjam WHERE nama LIKE :keyword");
    $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    $stmt->execute();

    // lookup all hints if query result is not empty
    $hints = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Output "no suggestion" if no hint was found or output correct values
    if (!empty($hints)) {
        echo json_encode($hints);
    } else {
        $response[] = array('nama' => 'no suggestion');
        echo json_encode($response);
    }

    // Menutup koneksi
    $pdo = NULL;
} catch (PDOException $e) {
    exit("PDO Error: " . $e->getMessage() . "<br>");
}
?>