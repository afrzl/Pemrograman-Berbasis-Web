<?php
require 'DB_CON.php';
try {
    $slot = $_POST['slot'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $pdo = new PDO($dsn, $db_username, $db_password, $opt);

    $query =
        'UPDATE meetings SET name = :name, email = :email WHERE slot = :slot';

    $stmt = $pdo->prepare($query);
    $stmt->bindparam(':slot', $slot, PDO::PARAM_INT);
    $stmt->bindparam(':name', $name, PDO::PARAM_STR);
    $stmt->bindparam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $pdo = null;

    $message = urlencode('Data berhasil diubah');
    header('Location: php09F.php?color=green&msg=' . $message);
} catch (PDOException $e) {
    exit('PDO Error: ' . $e->getMessage() . '<br>');
}
