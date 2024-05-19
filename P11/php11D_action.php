<?php
require '../DB_CON.php';
$username = $_POST['username'];
$password = $_POST['password'];

$pdo = new PDO($dsn, $db_username, $db_password, $opt);
$query = 'SELECT * FROM users WHERE username = :username LIMIT 1';

$stmt = $pdo->prepare($query);
$stmt->bindparam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        header('Location: php11F.php');
    } else {
        $message = urlencode('Password salah');
        header('Location: php11D.php?msg=' . $message);
    }
} else {
    $message = urlencode('Akun tidak ditemukan');
    header('Location: php11D.php?msg=' . $message);
}

$pdo = null;
