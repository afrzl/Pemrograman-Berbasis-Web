<?php
require 'DB_CON.php';
try {
    $slot = $_POST['slot'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $pdo = new PDO($dsn, $db_username, $db_password, $opt);

    $query = 'SELECT * FROM meetings WHERE slot = :slot';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':slot', $slot, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $message = urlencode('Slot ' . $slot . ' sudah ada');
        header('Location: php09F.php?color=red&msg=' . $message);
    }

    $query = 'INSERT INTO meetings VALUES (:slot, :name, :email)';

    $stmt = $pdo->prepare($query);
    $stmt->bindparam(':slot', $slot, PDO::PARAM_INT);
    $stmt->bindparam(':name', $name, PDO::PARAM_STR);
    $stmt->bindparam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $pdo = null;

    $message = urlencode('Data berhasil ditambah');
    header('Location: php09F.php?color=green&msg=' . $message);
} catch (PDOException $e) {
    exit('PDO Error: ' . $e->getMessage() . '<br>');
}
