<?php
require 'DB_CON.php';
try {
    $slot = $_GET['slot'];

    $pdo = new PDO($dsn, $db_username, $db_password, $opt);

    $query = 'DELETE FROM meetings WHERE slot = :slot';

    $stmt = $pdo->prepare($query);
    $stmt->bindparam(':slot', $slot, PDO::PARAM_INT);
    $stmt->execute();
    $pdo = null;

    $message = urlencode('Data berhasil dihapus');
    header('Location: php09F.php?color=green&msg=' . $message);
} catch (PDOException $e) {
    exit('PDO Error: ' . $e->getMessage() . '<br>');
}
