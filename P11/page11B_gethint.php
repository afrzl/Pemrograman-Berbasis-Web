<?php

include '../DB_CON.php';

try {
    //Code 6
    $keyword = '%' . $_GET['keyword'] . '%';
    try {
        $pdo = new PDO($dsn, $db_username, $db_password, $opt);
        $query = 'SELECT * FROM meetings WHERE name LIKE :keyword';
        $stmt = $pdo->prepare($query);
        $stmt->bindparam(':keyword', $keyword, PDO::PARAM_STR);
        $stmt->execute();
        $stmt = $stmt->fetchAll();

        $pdo = null;
    } catch (PDOException $e) {
        exit('PDO Error: ' . $e->getMessage() . '<br>');
    }

    // lookup all hints if query result is not empty
    if ($stmt) {
        echo json_encode($stmt);
    } else {
        // Output "no suggestion" if no hint was found or output correct values
        $response[] = [
            'name' => 'no suggestion',
        ];

        echo json_encode($response);
    }

    $pdo = null;
} catch (PDOException $e) {
    exit('PDO Error: ' . $e->getMessage() . '<br>');
}
